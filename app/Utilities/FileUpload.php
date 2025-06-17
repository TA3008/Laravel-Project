<?php

namespace App\Utilities;

use Illuminate\Http\UploadedFile;

class FileUpload
{
    public static function upload(UploadedFile $file, $folder = 'posts')
    {
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $path = 'assets/uploads/' . $folder;

        // Tự tạo thư mục nếu chưa tồn tại
        if (!file_exists(public_path($path))) {
            mkdir(public_path($path), 0755, true);
        }

        $file->move(public_path($path), $filename);

        return $path . '/' . $filename; 
    }
}
