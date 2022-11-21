<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AvatarController extends Controller
{
    public function changeAvatar(Request $request)
    {
        $idFile = $request->get('id');

        $user = Auth::user();

        $user->file()->sync($idFile);

        return response()->json([
           'url' => $user->file[0]->getUrl()
        ]);
    }
}
