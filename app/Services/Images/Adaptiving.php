<?php

namespace App\Services\Images;

use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class Adaptiving
{
    static function create($image, $width, $height)
    {
        $w = $width ?? 260;
        $h = $height ?? 180;

        $frontImg = (Image::make($image))
            ->resize($w, $h, function ($con) {
                $con->aspectRatio();
                $con->upsize();
            });

        $backImg = (Image::make($image))
            ->resize($w, $h)
            ->blur(100)
        ;

        $insertImg = $backImg->insert($frontImg);

//        Storage::disk('public')->putFileAs('/images')

        $url = ((FileController::file($image))->toArray())['url'];

        return $url;
    }
}
