<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdController extends Controller
{
    public function edit(Request $request, int $id)
    {
        $ad = Advertisement::find($id);

        $adData = [
            'id' => $ad->id,
        ];

        return view('addAdvert', ['ad' => $adData]);
    }
}
