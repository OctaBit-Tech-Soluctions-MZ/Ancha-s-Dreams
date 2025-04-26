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
        $keyPath = storage_path('app/google/google-drive-key.json');
        
        if (!file_exists($keyPath)) {
            throw new Exception('Arquivo de credenciais Google não encontrado.');
        }

        $this->client = new Client();
        $this->client->setAuthConfig($keyPath);
        $this->client->addScope(Drive::DRIVE);
        $this->client->useApplicationDefaultCredentials();
        $this->client->fetchAccessTokenWithAssertion();

        $this->drive = new Drive($this->client);
    }

    public function testConnection()
    {
        try {
            $files = $this->drive->files->listFiles(['pageSize' => 1]);
            return $files ? 'Conexão OK' : 'Falha na conexão';
        } catch (Exception $e) {
            throw new Exception('Erro ao testar conexão: ' . $e->getMessage(), 0, $e);
        }
    }

    public function uploadVideo($filePath, $filename, $folderId = null)
    {
        $mime = mime_content_type($filePath);
        return $this->uploadFile($filePath, $filename, $mime, $folderId);
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
            throw new Exception('Erro ao definir permissões: ' . $e->getMessage(), 0, $e);
        }
    }

    public function uploadFile($path, $name, $mimeType, $parentFolderId = null)
    {
        try {
            $content = @file_get_contents($path);
            if ($content === false) {
                throw new Exception('Não foi possível ler o conteúdo do arquivo: ' . $path);
            }

            $file = new DriveFile([
                'name' => $name,
                'parents' => $parentFolderId ? [$parentFolderId] : null,
            ]);

            $uploadedFile = $this->drive->files->create($file, [
                'data' => $content,
                'mimeType' => $mimeType,
                'uploadType' => 'multipart',
                'fields' => 'id, webViewLink, webContentLink'
            ]);

            return $uploadedFile;
        } catch (Exception $e) {
            throw new Exception('Erro ao enviar arquivo: ' . $e->getMessage(), 0, $e);
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
            throw new Exception('Erro ao criar pasta: ' . $e->getMessage(), 0, $e);
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
            throw new Exception('Erro ao listar arquivos: ' . $e->getMessage(), 0, $e);
        }
    }
}
