<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdvertisementCollection;
use App\Http\Resources\AdvertisementResource;
use App\Http\Resources\FavoriteResource;
use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FavoritesController extends Controller
{
    public function view()
    {
        return view('favorites');
    }
}
