<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileController extends Controller
{
    public $id = 0;

    public function getId()
    {
        if (Auth::check()){
            return $id = Auth::user()->id;
        } else {
            return $id = null;
        }
    }

    public function file(FileRequest $request)
    {
        /** @var UploadedFile $file */
        $uploadedFile = $request->files->get('file');
//        dd(
//            $uploadedFile = $request->safe()->except(['name', 'email']);
//        );
        $uploadedFileName = md5($uploadedFile->getClientOriginalName().time())
            . "."
            . $uploadedFile->getClientOriginalExtension();



        $newFile = File::create([
            'original_name' => $uploadedFile->getClientOriginalName(),
            'size_bytes' => $uploadedFile->getSize(),
            'location' => '/uploads',
            'new_hash_name' => $uploadedFileName,
            'extension' => $uploadedFile->getClientOriginalExtension(),
            'loaded_by' => $this->getId()
        ]);


        $uploadedFile->move(public_path('uploads'), $uploadedFileName);

        return response()->json([
            "id" => $newFile->id,
            "url" => $newFile->getUrl()
        ]);
//        dd(
//          $newFile->getUrl()
//        );
    }
}
