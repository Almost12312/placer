<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdvertisementCollection;
use App\Http\Resources\AdvertisementResource;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResourse;
use App\Models\Advertisement;
use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CabinetController extends Controller
{

    public function cabinet(Request $request) {

//        $ads = Advertisement::where([
//            'author_id' => Auth::id(),
//            'status' => 1
//        ])->get();

//        for ($i = 0; $i < count($ads); $i++)
//        {
//
//        }

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


        return view('cabinet');
    }

    public function profile(Request $request)
    {
//        $id = $request->route('id');
//
//        if ($id === null)
//        {
//            $id = Auth::id();
//        }

        $myProfile = User::find(Auth::id());

        return new UserResourse($myProfile);
    }
}
