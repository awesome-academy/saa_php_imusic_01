<?php

namespace App\Repositories;

class FileRepository
{
    public function uploadFile($file)
    {
        if ($file) {
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $name = md5(time() . $filename) . ".$extension";
            try {
                $file->move('web/images', $name);
                return $name;
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
        return null;
    }

    public function removeFile($path)
    {
        unlink($path);
    }
}
