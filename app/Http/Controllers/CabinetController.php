<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Support\Facades\Auth;

class CabinetController extends Controller
{
    public function cabinet() {

        $ads = Advertisement::where([
            'author_id' => Auth::id(),
            'status' => 1
        ])->get();

        return view('cabinet', ['ads' => $ads]);
    }
}
