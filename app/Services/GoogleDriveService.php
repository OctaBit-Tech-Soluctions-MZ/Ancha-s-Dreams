<?php

namespace App\Services;

use Google\Client;
use Google\Service\Drive;
use Google\Service\Drive\DriveFile;
use Google\Service\Drive\Permission;
use Exception;

class GoogleDriveService
{
    protected $client;
    protected $drive;

    public function __construct()
    {
        $this->client = new Client();

        // Caminho para sua credencial da conta de serviço
        $this->client->setAuthConfig(storage_path('app/google/google-drive-key.json'));

        // Escopo necessário para manipular arquivos no Drive
        $this->client->addScope(Drive::DRIVE);

        // Usa credenciais padrão e garante que o token JWT é válido
        $this->client->useApplicationDefaultCredentials();
        $this->client->fetchAccessTokenWithAssertion(); // <-- Importante!

        $this->drive = new Drive($this->client);
    }

    public function testConnection()
    {
        try {
            $files = $this->drive->files->listFiles(['pageSize' => 1]);
            return $files ? 'Conexão OK' : 'Falha na conexão';
        } catch (Exception $e) {
            return 'Erro: ' . $e->getMessage();
        }
    }

    public function uploadVideo($filePath, $filename, $folderId)
    {
        try {
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
        } catch (Exception $e) {
            return 'Erro ao enviar vídeo: ' . $e->getMessage();
        }
    }

    public function permission($fileId)
    {
        try {
            $permission = new Permission([
                'type' => 'anyone',
                'role' => 'reader',
            ]);

            $this->drive->permissions->create($fileId, $permission);
        } catch (Exception $e) {
            return 'Erro ao definir permissões: ' . $e->getMessage();
        }
    }

    public function uploadFile($path, $name, $mimeType, $parentFolderId = null)
    {
        try {
            $file = new DriveFile([
                'name' => $name,
                'parents' => $parentFolderId ? [$parentFolderId] : null
            ]);

            $content = file_get_contents($path);

            $uploadedFile = $this->drive->files->create($file, [
                'data' => $content,
                'mimeType' => $mimeType,
                'uploadType' => 'multipart',
                'fields' => 'id, webViewLink, webContentLink'
            ]);
            return $uploadedFile;
        } catch (Exception $e) {
            return 'Erro ao enviar arquivo: ' . $e->getMessage();
        }
    }

    public function createFolder($folderName)
    {
        try {
            $folderMetadata = new DriveFile([
                'name' => $folderName,
                'mimeType' => 'application/vnd.google-apps.folder',
            ]);

            $folder = $this->drive->files->create($folderMetadata, [
                'fields' => 'id'
            ]);

            return $folder->id;
        } catch (Exception $e) {
            return 'Erro ao criar pasta: ' . $e->getMessage();
        }
    }

    public function listArchives()
    {
        try {
            $results = $this->drive->files->listFiles([
                'pageSize' => 10,
                'fields' => 'files(id, name, mimeType, webViewLink, webContentLink)',
            ]);

            return $results->getFiles();
        } catch (Exception $e) {
            return 'Erro ao listar arquivos: ' . $e->getMessage();
        }
    }
}
