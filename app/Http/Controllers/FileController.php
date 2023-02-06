<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use App\Http\Resources\AdvFileResourse;
use App\Models\Advertisement;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
        $storage = Storage::disk('public');

        $id = Auth::check() ? Auth::user()->id : null;

        $filepath = $storage->putFileAs('/images', $uploadedFile, $uploadedFileName);

        $newFile = File::create([
            'original_name' => $uploadedFile->getClientOriginalName(),
            'size_bytes' => $uploadedFile->getSize(),
//            'location' => '/uploads',
            'location' => '/storage/images',
//            'location' => url('/storage/' . $filepath),
            'new_hash_name' => $uploadedFileName,
            'extension' => $uploadedFile->getClientOriginalExtension(),
            'loaded_by' => $id
        ]);
//        $uploadedFile->move(public_path('uploads'), $uploadedFileName);

        return response()->json([
            "id" => $newFile->id,
            "url" => $newFile->getUrl()
        ]);
    }

    public function getCurrentFile(Request $request )
    {
        $id = $request->get('id');

        if ($id !== null)
        {
            $adv = Advertisement::find($id);

            return new AdvFileResourse($adv);
        }

    }
}
