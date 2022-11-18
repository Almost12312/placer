<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdvertisementCollection;
use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FullAdvResourceController extends Controller
{
    public function res()
    {
        $allAdv = Advertisement::where([
            'author_id' => Auth::id(),
            'status' => 1
        ])->get();
        return new AdvertisementCollection($allAdv);
    }
}
