<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use League\Glide\Server;


class ImageController extends Controller
{
    public function store(Server $server, $path)
    {
        return $server->outputImage($path, $_GET);
    }
}
