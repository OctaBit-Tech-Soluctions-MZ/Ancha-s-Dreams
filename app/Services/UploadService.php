<?php

namespace App\Services;

class UploadService
{
    public $path = null;

    /**
     * Create a new class instance.
     */
    public function __construct(public $file, public $filename = 'default.png')
    {
        //
    }

    public function upload($folder, $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'])
    {

        if ($this->file && $this->file->isValid()) {
            $extension = strtolower($this->file->extension());

            if (!in_array($extension, $allowedExtensions)) {
                // Apenas retorna erro (o controller decide o que fazer)
                return [
                    'error' => true,
                    'message' => 'Formato do arquivo inválido.',
                ];
            }

            $this->filename = md5(uniqid()) . '.' . $extension;
            $this->path = $this->file->storeAs($folder, $this->filename, 'public');
        }

        return [
            'name' => $this->filename,
            'path' => $this->path,
            'error' => false,
        ];
    }

}
