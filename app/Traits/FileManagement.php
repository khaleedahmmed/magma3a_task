<?php

namespace App\Traits;

trait FileManagement
{
    public function uploadFile($image, $path = '')
    {
        $imageName = uniqid(rand()) . '.' . $image->getClientOriginalExtension();
        $image->move($path, $imageName);
        return $imageName;
    }

    protected function deleteFile($path)
    {
        try {
            unlink($path);
        } catch (\Exception $e) {
            return $path;
        }
        return true;
    }
}
