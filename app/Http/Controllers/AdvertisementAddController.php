<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdvertisementAddController extends Controller
{

    public function addAdvert(Request $request)
    {

        $id = $request->get('id');
        $title = $request->get('title');
        $content = $request->get('content');
        $location = $request->get('location');
        $price = $request->get('price');
        $imageIds = $request->get('images_ids');

        $advertisement = Advertisement::updateOrCreate([
            'id' => $id,
            'author_id' => $request->user()->id,
            'title' => $title,
            'content' => $content,
            'location' => $location,
            'price' => $price,
            'status' => 1,
        ]);

        $advertisement->files()->sync($imageIds);
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

//    public function redAdvert(Request $request)
//    {
//        $id = $request->get('id');
//
//        $titleRed = $request->get('title');
//        $contentRed = $request->get('content');
//        $locationRed = $request->get('price');
//        $priceRed = $request->get('price');
//        $imageRed = $request->get('imgs');
//
//        $red = Advertisement::where([
//            'id' => $id
//        ]);
//
//        $red->update([
//            'title' => $titleRed,
//            'content' => $contentRed,
//            'location' => $locationRed,
//            'price' => $priceRed
//        ]);
//    }

    public function view(Request $request)
    {
        $id = $request->get('idAd');


        $thisAdv = Advertisement::where([
            'id' => $id
        ])->get();

        $thisAdvContent = Advertisement::where([
            'id' => $id
        ])->get(['title', 'location', 'price', 'content']);

        $thisImgs = [];


        foreach ($thisAdv[0]->files as $file)
        {
            $thisImgs[] = ["id" => $file["id"], "url" => $file->getUrl()];
        }


        return redirect()->route('addAdvert', ['thisAdv' => $thisAdvContent, "thisImgs" => $thisImgs]);
//        return view('addAdvert', ['thisAdv' => $thisAdvContent, "thisImgs" => $thisImgs]);
    }

    public function getView(Request $request) {

        if (isset($thisAdvContent, $thisImgs))
        {
            $thisAdvContent = $request->get('thisAdv');
            $thisImgs = $request->get('thisImgs');
            return view('addAdvert', ['thisAdv' => $thisAdvContent, "thisImgs" => $thisImgs]);
        } else {
            return view('addAdvert');

        }
    }
}
