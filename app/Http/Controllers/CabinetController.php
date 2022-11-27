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

    public function cabinet(Request $request)
    {
        return view('cabinet');
    }

    public function changeAvatar(Request $request)
    {
        $idFile = $request->get('id');

        $user = Auth::user();

        $user->files()->sync($idFile);

        return response()->json([
            'url' => $user->files[0]->getUrl()
        ]);
    }

    public function profile(Request $request)
    {
        $user = User::find(Auth::user()->id);

        return new UserResourse($user);
    }
}
