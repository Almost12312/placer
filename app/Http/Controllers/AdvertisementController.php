<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use App\Models\Advertisement;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class AdvertisementController extends FileController
{
    
   public function advertisement(Request $request)
   {
        $title = $request->get('title');
        $content = $request->get('content');
        $location = $request->get('location');
        $price = $request->get('price');

        Advertisement::create([
            'author_id' => parent::getId(),
            'title' => $title,
            'content' => $content,
            'location' => $location,
            'price' => $price
        ]);

        return response()->json([
           'success' => true
        ]);
   }
}
