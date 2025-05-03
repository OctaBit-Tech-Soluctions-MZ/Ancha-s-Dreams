<?php

namespace App\Jobs;

use App\Models\Content;
use App\Services\GoogleDriveService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UploadVideoToGoogleDriveJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public $content, public $videoPath, public $title, public $folder = null)
    {
        //
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
        
        $path = storage_path('app/public/tmp/'. $this->videoPath);
        if (!file_exists($path)) {
            Log::error('Arquivo de vídeo não encontrado', ['path' => $path]);
            throw new \Exception('Arquivo de vídeo não encontrado');
        }

        try {
            Log::info('Arquivo encontrado. Iniciando upload para o Google Drive');

            $gds = new GoogleDriveService();
            $drive_file = $gds->uploadVideo($path, $this->title, $this->folder);

            Log::info('Upload feito com sucesso', ['drive_file_id' => $drive_file->id]);

            $gds->permission($drive_file->id);

            $thumbnailPath = storage_path('app/public/thumbnail/'.$this->title).'.png';

            $content->update([
                'file_id' => $drive_file->id,
                'url' => 'https://drive.google.com/file/d/' . $drive_file->id . '/preview',
                'video_status' => 'concluido',
                'duration' => getDurationVideo($path),
                'thumbnail' => generateThumbnail($path, $thumbnailPath)
            ]);
            Storage::disk('public')->delete('tmp/' . basename($path));
            Log::info('Content atualizado com sucesso', ['content_id' => $content->id]);
        } catch (\Exception $e) {
            Log::error('Erro durante o upload: '.$e->getMessage());
            throw $e;
        }
    }

    public function failed(\Exception $exception)
    {
        $content = Content::find($this->content);
        $content->update([
            'video_status' => 'falhou'
        ]);
        Log::error('O carregamento do video falhou após tentativas: '.$exception->getMessage());
    }
}
