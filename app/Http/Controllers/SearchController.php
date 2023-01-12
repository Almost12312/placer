<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Search;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class SearchController extends Controller
{
    public function category(int $id)
    {
        return view('searchResults', ['id' => $id]);
    }

    public function words(Request $request)
    {
        $searchArr = explode(' ', $request->get('str'));

        $words = [];
        foreach ($searchArr as $item)
        {
            $words[] = Search::
                where('suggestion', 'LIKE', "%$item%")
                ->get(['suggestion', 'id'])
                ->toArray()
                ;
        }

        dd(array_intersect($words[0], $words[1]));
        for ($i = 0; $i < count($words); $i++)
        {
            if ($i > 0)
            $res = array_intersect($words[$i-1], $words[$i]);
        }
//
//        for ($i = 0; $i < count($words), $i++)
//        {
//            dump($words[$i]);
//        }

        dd($res);

//        $res = array_filter($words, $words->intersection());

//        for ($i = 0; $i < count($words); $i++) {
//
//            if (!($i === 0)) {
//                $res = $words[0]->intersect($words[0]);
//            }
//        }

        return response()->json([
            'data' => $res
        ]);

//        $findWords = DB::table('searches')
//            ->where('suggestion', 'LIKE', "%$find%")
//            ->get('suggestion');

//        return response()->json([
//            'data' => $res
//        ]);
    }
}
