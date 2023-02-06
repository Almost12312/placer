<?php

namespace App\Http\Controllers;

use App\Services\Images\Adaptiving;
use Illuminate\Http\Request;


class ImageController extends Controller
{
    public function create(Request $request)
    {
        $w = $request->get('w') ?? 260;
        $h = $request->get('h') ?? 180;
        $imgId = $request->get('id');

        $url = Adaptiving::create($imgId, $w, $h);

        return $url;
    }
}
