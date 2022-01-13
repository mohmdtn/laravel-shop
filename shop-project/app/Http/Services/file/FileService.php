<?php

namespace App\Http\Services\file;


class FileService extends FileToolsService {

    public function moveToPublic($file){

        // set file
        $this->setFile($file);

        // execute provider
        $this->provider();

        // save file
        $result = $file->move(public_path($this->getFinalFileDirectory()), $this->getFinalFileName());
        return $result ? $this->getFileAddress() : false;

    }


    public function moveToStorage($file){

        // set file
        $this->setFile($file);

        // execute provider
        $this->provider();

        // save file
        $result = $file->move(storage_path($this->getFinalFileDirectory()), $this->getFinalFileName());
        return $result ? $this->getFileAddress() : false;

    }


    public function deleteFile($file, $storage = false){

        if ($storage){
            unlink(storage_path($file));
            return true;
        }

        if (file_exists($file)){
            unlink($file);
            return true;
        }

        else{
            return false;
        }

    }


}
