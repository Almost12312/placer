<?php

namespace App\Http\Controllers;


use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;



class MainController extends Controller
{
    public function file(Request $request)
    {
        /** @var UploadedFile $file */
        $uploadedFile = $request->files->get('file');

        $uploadedFileName = md5($uploadedFile->getClientOriginalName().date('l jS \of F Y h:i:s A')).".".$uploadedFile->getClientOriginalExtension();
        $uploadedFile->move(public_path('uploads'), $uploadedFileName);
//        dd(
//            $uploadedFile->getClientOriginalExtension()
//        );

        File::create([
            'original_name' => $uploadedFile->getClientOriginalName(),
            'size_bytes' => $uploadedFile->getSize(),
            'location' => Storage::disk('local')->url($uploadedFile),
            'new_hash_name' => $uploadedFileName,
            'extension' => $uploadedFile->getClientOriginalExtension(),
            'loaded_by' => '',
        ]);
    }
}
