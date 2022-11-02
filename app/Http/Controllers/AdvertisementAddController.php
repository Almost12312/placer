<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdvertisementAddController extends Controller
{
    public function addAdvert(Request $request)
    {

        $title = $request->get('title');
        $content = $request->get('content');
        $location = $request->get('location');
        $price = $request->get('price');
        $imageIds = $request->get('image_ids');

        $advertisement = Advertisement::create([
            'author_id' => $request->user()->id,
            'title' => $title,
            'content' => $content,
            'location' => $location,
            'price' => $price,
            'status' => 1,
        ]);

        $advertisement->files()->sync($imageIds);

        return response()->json([
           'success' => true
        ]);
    }

    public function delAdvert(Request $request)
    {
        $id = $request->get('id');

        $del = Advertisement::where([
           'id' => $id
        ]);

        $del->update([
            "status" => 2,
            "delete_at" => date('Y-d-m H:i:s.v')
        ]);

        return response()->json([
            $del
        ]);
    }

    public function redAdvert(Request $request)
    {
        $id = $request->get('id');

        $titleRed = $request->get('title');
        $contentRed = $request->get('content');
        $locationRed = $request->get('price');
        $priceRed = $request->get('price');
        $imageRed = $request->get('imgs');

        $red = Advertisement::where([
            'id' => $id
        ]);

        $red->update([
            'title' => $titleRed,
            'content' => $contentRed,
            'location' => $locationRed,
            'price' => $priceRed
        ]);

//        $xer = $red->files()->where('advertisement_id', '=', "$imageRed")->get();
//        $xer = $red->whereHas('files', function ($query, $id){
//            $query->where('id', $id);
//        });

//        Advertisement::where([
//            'id' => $id
//        ])->files()->sync($imageRed);
    }
}
