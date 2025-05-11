<?php

namespace App\Services;

use pCloud\Sdk\App;
use pCloud\Sdk\Folder;
use pCloud\Sdk\File;

class PCloudService{

    private $pCloudApp;

    /**
     * Inicialização do Serviço pCloud
     */
    public function __construct()
    {
        $access_token = "ACCESS_TOKEN";
        $locationid = 1;

        $pCloudApp = new App();
        $pCloudApp->setAccessToken($access_token);
        $pCloudApp->setLocationId($locationid);
    }

    public function createFolder($folder_name){

        // Create Folder instance & Create new folder in root
        return new Folder ($this->pCloudApp)->create($folder_name);
    }

    public function upload($folder_name, $path, $file_name = '')
    {
        // Create File instance & Upload new file in created folder
        return new File ($this->pCloudApp)->upload($path , $this->createFolder($folder_name));
    }

    public function getFolderContent($folderId) {
        return new Folder($this->pCloudApp)->getContent($folderId);
    }
}