<?php

namespace App\Jobs;

use App\Services\GoogleDriveService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UploadFileToGoogleDriveJob implements ShouldQueue
{
   use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public Model $model, public string $path, public string $name, public string $folder)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
    Log::info('Iniciando upload do Arquivo', ['id' => $this->model->id]);

        if (!$this->model) {
            Log::error('product não encontrado', ['id' => $this->model]);
            return;
        }

        if (!file_exists($this->path)) {
            Log::error('Arquivo não encontrado', ['path' => $this->path]);
            throw new \Exception('Arquivo não encontrado');
        }

        try {
            Log::info('Arquivo encontrado. Iniciando upload para o Google Drive');

            $gds = new GoogleDriveService();
            $drive_file = $gds->uploadFile($this->path, $this->name,mime_content_type($this->path), $this->folder);

            Log::info('Upload feito com sucesso', ['drive_file_id' => $drive_file->id]);

            $gds->permission($drive_file->id);

            $this->model->update([
                'url' => 'https://drive.google.com/file/d/' . $drive_file->id . '/preview',
                'status' => 'concluido',
            ]);
            Storage::disk('public')->delete('livewire-tmp/' . basename($this->path));
            Log::info('Tabela atualizado com sucesso', ['product_id' => $this->model->id]);
        } catch (\Exception $e) {
            Log::error('Erro durante o upload: '.$e->getMessage());
            throw $e;
        }
    }

    public function failed(\Exception $exception)
    {
        $this->model->update([
            'status' => 'cancelado'
        ]);
        Log::error('O carregamento do livro falhou após tentativas: '.$exception->getMessage());
    }

}
