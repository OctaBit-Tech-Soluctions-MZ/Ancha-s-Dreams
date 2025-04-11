<?php

namespace App\Services;

use Google\Client;
use Google\Service\Drive;
use Google\Service\Drive\DriveFile;
use Google\Service\Drive\Permission;

class GoogleDriveService
{
    protected $client;
    protected $drive;

    public function __construct()
    {
        $this->client = new Client();
        $this->client->setAuthConfig(storage_path('app/google/google-drive-key.json'));
        $this->client->addScope(Drive::DRIVE);
        $this->client->setAccessType('offline');

        $this->drive = new Drive($this->client);
    }

    public function testConnection()
    {
        try {
            $files = $this->drive->files->listFiles(['pageSize' => 1]);
            return $files ? 'Conexão OK ✅' : 'Falha na conexão ❌';
        } catch (\Exception $e) {
            return 'Erro: ' . $e->getMessage();
        }
    }

    function uploadVideo($filePath, $filename, $folderId)
    {
        $fileMetadata = new DriveFile([
            'name' => $filename,
            'parents' => [$folderId],
        ]);

        $content = file_get_contents($filePath);

        $file = $this->drive->files->create($fileMetadata, [
            'data' => $content,
            'mimeType' => mime_content_type($filePath),
            'uploadType' => 'multipart',
            'fields' => 'id, webViewLink, webContentLink'
        ]);

        return $file;
    }

    public function permission($fileId){
        
        $permission = new Permission([
            'type' => 'anyone',
            'role' => 'reader',
        ]);

        $this->drive->permissions->create($fileId, $permission);
    }

    public function uploadFile($path, $name, $mimeType, $parentFolderId = null)
    {
        $file = new DriveFile([
            'name' => $name,
            'parents' => $parentFolderId ? [$parentFolderId] : null
        ]);

        $content = file_get_contents($path);

        $uploadedFile = $this->drive->files->create($file, [
            'data' => $content,
            'mimeType' => $mimeType,
            'uploadType' => 'multipart',
            'fields' => 'id'
        ]);

        return $uploadedFile->id;
    }

    function createFolder($folderName)
    {

        $folderMetadata = new DriveFile([
            'name' => $folderName,
            'mimeType' => 'application/vnd.google-apps.folder',
        ]);

        $folder = $this->drive->files->create($folderMetadata, [
            'fields' => 'id'
        ]);

        return $folder->id;
    }


    public function listarArquivos() {

        $results = $this->drive->files->listFiles([
            'pageSize' => 10,
            'fields' => 'files(id, name, mimeType, webViewLink, webContentLink)',
        ]);

        return $results->getFiles();
    }


}
