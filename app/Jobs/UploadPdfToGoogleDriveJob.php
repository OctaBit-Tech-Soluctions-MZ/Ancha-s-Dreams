<?php

namespace App\Jobs;

use App\Models\Product;
use App\Services\GoogleDriveService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UploadPdfToGoogleDriveJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public $product, public $productPath, public $title, public $folder = null)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
    Log::info('Iniciando upload de vídeo', ['product_id' => $this->product]);

        $product = Product::find($this->product);

        if (!$product) {
            Log::error('product não encontrado', ['id' => $this->product]);
            return;
        }
        
        $path = storage_path('app/public/tmp/'. $this->productPath);
        if (!file_exists($path)) {
            Log::error('Arquivo de Livro não encontrado', ['path' => $path]);
            throw new \Exception('Arquivo de Livro não encontrado');
        }

        try {
            Log::info('Arquivo encontrado. Iniciando upload para o Google Drive');

            $gds = new GoogleDriveService();
            $drive_file = $gds->uploadFile($path, $this->title,mime_content_type($path), $this->folder);

            Log::info('Upload feito com sucesso', ['drive_file_id' => $drive_file->id]);

            $gds->permission($drive_file->id);

            $product->update([
                'url' => 'https://drive.google.com/file/d/' . $drive_file->id . '/preview',
                'status' => 'concluido',
            ]);
            Storage::disk('public')->delete('tmp/' . basename($path));
            Log::info('product atualizado com sucesso', ['product_id' => $product->id]);
        } catch (\Exception $e) {
            Log::error('Erro durante o upload: '.$e->getMessage());
            throw $e;
        }
    }

    public function failed(\Exception $exception)
    {
        $product = product::find($this->product);
        $product->update([
            'status' => 'cancelado'
        ]);
        Log::error('O carregamento do livro falhou após tentativas: '.$exception->getMessage());
    }
}
