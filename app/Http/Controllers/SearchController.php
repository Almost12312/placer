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

    public function findWords($arr)
    {
        $arrSeparate = explode(' ', $arr);

        if ($arrSeparate[0] !== '')
        {
            $words = [];
            foreach ($arrSeparate as $item)
            {
                $words[] = Search::
                where('suggestion', 'LIKE', "%$item%")
                    ->limit(20)
                    ->get(['id', 'suggestion'])
                    ->toArray()
                ;
            }

            $ids = [];
            if (count($arrSeparate) >= 2)
            {
                for ($i = 0; $i < count($words); $i++)
                {
                    for ($count = 0; $count < count($words[$i]); $count++)
                    {
                        if (!(in_array($words[$i][$count], $ids)))
                        {
                            $ids[] = $words[$i][$count];
                        }   else {
                            $res = $words[$i][$count];
                        }
                    }
                }
            } else if (count($arrSeparate) === 1) {
                $res = $words[0];
            }   else {
                $res = [];
            }
//            return response()->json([
//                'data' => $res
//            ]);
            return $res;
        } else {
//            return response()->json([
//                'end' => true
//            ]);
            return null;
        }
    }

    public function suggestions(Request $request)
    {
        $searchArr = $request->get('str');

        if ($request->get('id'))
        {
            //TODO: realize unsearching if isset id
        }
        $res = $this->findWords($searchArr);

        if ($res !== null)
        {
            return response()->json([
                'data' => $res
            ]);
        }   else {
            return response()->json([
                'end' => true
            ]);
        }
    }

    public function wordsRequest(Request $request)
    {
        $searchArr = $request->get('str');

        $res = $this->findWords($searchArr);

        $options = [
            'wordsReq' => []
        ];

        for ($i = 0; $i < count($res); $i++) {
            $options[]['wordsReq'] = $res[$i]['suggestion'];
        }

        return redirect()->route('searchResults', ['options' => [$options]]);
    }
}
