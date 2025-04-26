<?php

namespace App\Jobs;

use App\Models\Content;
use App\Services\GoogleDriveService;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class JobUploadVideoToCloud implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;
    public $timeout = 1200;
    public $videoPath;
    public $title;
    public $folder;
    public $content;

    /**
     * Create a new job instance.
     */
    public function __construct($content, $videoPath, $title, $folder = null)
    {
        $this->content = $content;
        $this->videoPath = $videoPath;
        $this->title = $title;
        $this->folder = $folder;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info('Iniciando upload de vídeo', ['content_id' => $this->content]);

        $content = Content::find($this->content);

        if (!$content) {
            Log::error('Content não encontrado', ['id' => $this->content]);
            return;
        }

        // Verifica e corrige a duplicação da pasta 'tmp'
        if (strpos($this->videoPath, 'tmp/tmp') !== false) {
            $this->videoPath = str_replace('tmp/tmp', 'tmp', $this->videoPath);
        }
        
        $this->videoPath = storage_path( $this->videoPath);
        if (!file_exists($this->videoPath)) {
            Log::error('Arquivo de vídeo não encontrado', ['path' => $this->videoPath]);
            throw new Exception('Arquivo de vídeo não encontrado');
        }

        try {
            Log::info('Arquivo encontrado. Iniciando upload para o Google Drive');

            $gds = new GoogleDriveService();
            $drive_file = $gds->uploadVideo($this->videoPath, $this->title, $this->folder);

            Log::info('Upload feito com sucesso', ['drive_file_id' => $drive_file->id]);

            $gds->permission($drive_file->id);

            $content->file_id = $drive_file->id;
            $content->url_view = $drive_file->webViewLink;
            $content->url_download = $drive_file->webContentLink;
            $content->duration = getDurationVideo($this->videoPath);
            $content->url_preview = 'https://drive.google.com/file/d/' . $drive_file->id . '/preview';
            $content->video_status = 'concluido';
            $content->save();
            Storage::disk('tmp')->delete($this->videoPath);
            Log::info('Content atualizado com sucesso', ['content_id' => $content->id]);
        } catch (Exception $e) {
            Log::error('Erro durante o upload: '.$e->getMessage());
            throw $e;
        }
    }

    public function failed(Exception $exception)
    {
        $content = Content::find($this->content);
        $content->video_status = 'falhou';
        $content->save();
        Log::error('O carregamento do video falhou após tentativas: '.$exception->getMessage());
    }
}
