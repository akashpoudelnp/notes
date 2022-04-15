<?php

namespace App\Services;

use App\Models\Upload;
use Illuminate\Support\Str;

class UploadService
{

    public static function upload($file, $folder = "uploads", $name = "")
    {
        if (empty($name))
            $name = Str::slug($file->getClientOriginalName()); //URL friendly string

        $type = $file->getMimeType(); // getting mime type of the file

        $ext = $file->extension(); // getting extension of file

        $folderPath = "public/" . $folder; // path where file is to be stored

        $filePath = Str::random(10) . mt_rand(1, 100) . "." . $ext; //name of the file

        $file->storeAs($folderPath, $filePath); // storing file

        $upload = Upload::create([
            'name' => $name,
            'path' => $folder . "/" . $filePath,
            'type' => $type,
        ]); // storing file information so it can be referenced later

        return $upload->id;  // returning the id of uploaded file
    }
}
