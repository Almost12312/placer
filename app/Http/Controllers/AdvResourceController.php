<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdvertisementCollection;
use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdvResourceController extends Controller
{
    public function res(Request $request)
    {
        $status = $request->get('status');

        $allAdv = Advertisement::where([
            'author_id' => Auth::id(),
            'status' => $status
        ])->get();

        return new AdvertisementCollection($allAdv);
    }
}
