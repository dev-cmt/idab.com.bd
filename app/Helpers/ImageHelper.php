<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ImageHelper
{
    public static function uploadImage($file, $folder, $update = null)
    {
        $fileUrl = null;

        if ($file) {
            // Delete existing file if $update is provided and has a file path
            if ($update) {
                $oldFilePath = public_path($update);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }

            // Generate a unique file name
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $uniqueName = Str::slug($originalName) . '_' . uniqid() . '.' . $extension;
            // $uniqueName = Str::slug($originalName) . '.' . $extension;

            // Define the directory path
            $directory = public_path($folder);

            // Ensure the directory exists; create if it doesn't
            if (!File::isDirectory($directory)) {
                File::makeDirectory($directory, 0777, true, true);
            }

            // Move the file to the directory with the new unique name
            $file->move($directory, $uniqueName);
            $fileUrl = "{$folder}/{$uniqueName}";
        } else {
            $fileUrl = $update ? $update : null;
        }

        return $fileUrl;
    }
}
