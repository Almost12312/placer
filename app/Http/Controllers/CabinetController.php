<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdvertisementResource;
use App\Models\Advertisement;
use App\Models\File;
use Illuminate\Support\Facades\Auth;

class CabinetController extends Controller
{
    public function getAdv($ad) {

        return new AdvertisementResource($ad);
    }

    public function cabinet() {

        $ads = Advertisement::where([
            'author_id' => Auth::id(),
            'status' => 1
        ])->get();

        $files = [];


        $ad = Advertisement::where([
           'id' => 12
        ])->get();

        $xer = $this->getAdv($ad);

        dd($xer);


//        $ads = array_map(function(Advertisement $ad) {
//            return [
//                'id' => $ad->id,
//                'images' => array_map(function(File $file) {
//                    return [
//                        'id' => $file->id,
//                        'src' => $file->getUrl(),
//                    ];
//                }, $ad->files->toArray())
//            ];
//        }, $ads->toArray());
//
//        $ads = [
//            [
//                'id' => 1,
//                'images' => [
//                    'id' => 1,
//                    'src' => ''
//                ]
//            ]
//        ];


        return view('cabinet', ['ads' => $ads]);
    }
}
