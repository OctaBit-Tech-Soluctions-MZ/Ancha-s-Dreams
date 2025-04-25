<?php

namespace App\Services;

class UploadService {

    /**
     * Upload de arquivos no servidor local
     * @param $file
     * @param string $path ex: /assets/example
     * @param string $fileDefault ex: 'imageDefault.png'
     * @param array $allowedExtensions ex: [pdf,docx,txt,csv]
     * @param string $messageError ex: 'formato do arquivo invalido'
     * @return string
     */
    public static function upload($file, $path, $fileDefault, $allowedExtensions, 
                                    $messageError = 'formato do arquivo invalido') : string {

        $fileName = $fileDefault;
        
        if ($file->isValid()) {
            $extension = $file->extension();
    
            // Segurança extra (evita upload de arquivos maliciosos)
            if (!in_array(strtolower($extension), $allowedExtensions)) {
                return redirect()->back()->with('error', $messageError);
            }
    
            $fileName = md5($file->getClientOriginalName() . time()) . '.' . $extension;

            $file->move(public_path($path), $fileName);
        }

        return $fileName;
    }
}