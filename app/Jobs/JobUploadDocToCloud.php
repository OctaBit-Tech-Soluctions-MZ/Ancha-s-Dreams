<?php

namespace App\Jobs;

use App\Models\Book;
use App\Services\GoogleDriveService;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class JobUploadDocToCloud implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public $book,public $path, public $title, )
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info('Iniciando upload de vídeo', ['content_id' => $this->book]);

        $book = Book::find($this->book);

        if (!$book) {
            Log::error('Content não encontrado', ['id' => $this->book]);
            return;
        }

        $this->path = storage_path('app/tmp/'.$this->path);
        if (!file_exists($this->path)) {
            Log::error('Arquivo não encontrado', ['path' => $this->path]);
            throw new Exception('Arquivo não encontrado');
        }
        try {
            Log::info('Arquivo encontrado. Iniciando upload para o Google Drive');
            $gds = new GoogleDriveService();
            $mimesType = mime_content_type($this->path);
            $drive_file = $gds->uploadFile($this->path, $this->title,$mimesType);
            Log::info('Upload feito com sucesso', ['drive_file_id' => $drive_file->id]);
            $gds->permission($drive_file->id);
            $book->pdf_book_url= 'https://drive.google.com/file/d/' . $drive_file->id . '/preview';
            $book->book_status = 'concluido';
            $book->save();
            Storage::disk('tmp')->delete($this->path);
            Log::info('Livro atualizado com sucesso', ['content_id' => $book->id]);
        } catch (Exception $e) {
            Log::error('Erro durante o upload: '.$e->getMessage());
            throw $e;
        }
    }

    public function failed(Exception $exception)
    {
        $book = Book::find($this->book);
        $book->book_status = 'falhou';
        $book->save();
        Log::error('O carregamento do video falhou após tentativas: '.$exception->getMessage());
    }
}
