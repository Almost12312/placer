<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdvertisementAddController extends Controller
{
    public function addAdvert(Request $request) {

        $title = $request->get('title');
        $content = $request->get('content');
        $location = $request->get('location');
        $price = $request->get('price');

        Advertisement::create([
            'author_id' => $request->user()->id,
            'title' => $title,
            'content' => $content,
            'location' => $location,
            'price' => $price,
            'status' => 1,


        ]);

        return response()->json([
           'success' => true
        ]);
    }
}
