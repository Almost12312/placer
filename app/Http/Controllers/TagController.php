<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;


class TagController extends Controller
{
    public function find(Request $request)
    {
        $tags = $request->get();

        $adData = [
            'id' => $ad->id,
        ];

        return view('addAdvert', ['ad' => $adData]);
    }
}
