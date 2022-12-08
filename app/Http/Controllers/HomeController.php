<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use App\Http\Resources\AdvertisementCollection;
use App\Http\Resources\AdvertisementResource;
use App\Models\Advertisement;
use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class HomeController extends Controller
{
    public function home() {

//        $advs = Advertisement::all()->where('status', '=', 1);

//        dd($links);
//        $advs = new AdvertisementCollection($getAdvs);

//        dd($advs[0]->files);

        return view('home');
    }
}
