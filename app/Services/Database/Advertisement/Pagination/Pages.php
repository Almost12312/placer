<?php

namespace App\Services\Database\Advertisement\Pagination;

use App\Models\Advertisement;
use Illuminate\Support\Facades\Auth;

class Pages
{
    static function paginate(string $page, int $perPage, int $start)
    {
        switch ($page) {
            case "favorites":
                $advsGet = Auth::user()->favorites
                    ->where('status', '=', 1)
                    ->skip($start)
                    ->take($perPage);

                break;

            case "drafts":
                $advsGet = Auth::user()
                    ->advertisements
                    ->where('status', '=', 2)
                    ->skip($start)
                    ->take($perPage);
                break;

            case "home":
                $advsGet = Advertisement
                    ::where('status', '=', 1)
                    ->skip($start)
                    ->take($perPage)
                    ->get();
                break;

            case "activeAdv":
                $advsGet = Auth::user()
                    ->advertisements
                    ->where('status', '=', 1)
                    ->skip($start)
                    ->take($perPage);
                break;
            case 'history':
                $advsGet = Auth::user()
                    ->advertisements
                    ->where('status', '=', 0)
                    ->skip($start)
                    ->take($perPage)
                ;
                break;
        }

        return $advsGet;
    }
}
