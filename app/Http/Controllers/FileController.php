<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use App\Models\File;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileController extends Controller
{

    public function file(FileRequest $request)
    {
        /** @var UploadedFile $file */
        $uploadedFile = $request->files->get('file');
        $uploadedFileName = md5($uploadedFile->getClientOriginalName().time())
            . "."
            . $uploadedFile->getClientOriginalExtension();

        $id = 0;

        if (Auth::check()){
            $id = Auth::user()->id;
        } else {
            $id = null;
        }

        $newFile = File::create([
            'original_name' => $uploadedFile->getClientOriginalName(),
            'size_bytes' => $uploadedFile->getSize(),
            'location' => '/uploads',
            'new_hash_name' => $uploadedFileName,
            'extension' => $uploadedFile->getClientOriginalExtension(),
            'loaded_by' => $id
        ]);


        $uploadedFile->move(public_path('uploads'), $uploadedFileName);

        return response()->json([
            "id" => $newFile->id,
            "url" => $newFile->getUrl()
        ]);
    }
}
