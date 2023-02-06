<?php

namespace App\Services\Images;

use App\Http\Controllers\FileController;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class Adaptiving
{
    static function create(int $imgId, int $w = 260, int $h = 260): string
    {
        $image = File::find($imgId);

        $name = 'prev_' . $w . '-' . $h . $image->new_hash_name;
        $storagePath = '/public/images/';
        $url = '/storage/images/' . $name;

        if (Storage::disk('local')->exists($storagePath . $name)) {
//            $sizes = getimagesize(storage_path('app/public/images/' . $name));
//            if ($sizes[0] === $w && $sizes[1] === $h) {
                return $url;
//            }
        }

        $imagePath = url($image->getUrl());

        $frontImg = (Image::make($imagePath))
            ->resize($w, $h, function ($con) {
                $con->aspectRatio();
                $con->upsize();
            });

        $backImg = (Image::make($imagePath))
            ->resize($w, $h)
            ->blur(100)
        ;

        $insertImg =
            $backImg->insert($frontImg, 'center')
        ->save(storage_path('/app/public/images/' . $name));

        return $url;
    }
}
