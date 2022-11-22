<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdvertisementController extends Controller
{

    public function addAdvert(Request $request)
    {

        $id = $request->get('id');
        $title = $request->get('title');
        $content = $request->get('content');
        $location = $request->get('location');
        $price = $request->get('price');
        $imageIds = $request->get('images_ids');

        $advertisement = Advertisement::updateOrCreate(
            [
                'id' => $id
            ],

            [
                'author_id' => $request->user()->id,
                'title' => $title,
                'content' => $content,
                'location' => $location,
                'price' => $price,
                'status' => 1,
            ]);

        if ($imageIds !== null)
        {
            $advertisement->files()->sync($imageIds);
        }

        return response()->json([
            "success" => true,
            "redirect" => "/cabinet"
        ]);
    }

    public function delAdvert(Request $request)
    {
        $id = $request->get('id');

        $delAdvert = Advertisement::find($id);

        $delAdvert->status = 2;

        $delAdvert->save();
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

    public function view(Request $request, int $id)
    {
        $thisAdv = Advertisement::find($id);

        $thisAdvContent = [
            "id" => $id,
            "title" => $thisAdv->title,
            "content" => $thisAdv->content,
            "location" => $thisAdv->location,
            "price" => $thisAdv->price
        ];

        $thisAdvFiles = [];

        foreach ($thisAdv->files as $file) {
            $thisAdvFiles [] = ["id" => $file["id"], "url" => $file->getUrl()];
        }

        return view('redAdvert', ['thisAdvContent' => $thisAdvContent, "thisAdvFiles" => $thisAdvFiles]);

//        $id = null;
//
//        if ($id !== null)
//        {
//            $thisAdv = Advertisement::where([
//                'id' => $id
//            ])->get();
//
//            $thisAdvContent = Advertisement::where([
//                'id' => $id
//            ])->get(['id', 'title', 'location', 'price', 'content']);
//
//            $thisImgs = [];
//
//
//            foreach ($thisAdv[0]->files as $file)
//            {
//                $thisImgs[] = ["id" => $file["id"], "url" => $file->getUrl()];
//            }
//
//
////            return redirect()->route('addAdvert', ['thisAdv' => $thisAdvContent, "thisImgs" => $thisImgs]);
//            return view('addAdvert', ['thisAdv' => $thisAdvContent, "thisImgs" => $thisImgs]);
//        } else {
//
//            $thisAdvContent = [
//                'title' => '',
//                'location' => '',
//                'price' => '',
//                'content' => ''
//            ];
//
//            $thisImgs = [];
//
//            return view('addAdvert', ['thisAdv' => $thisAdvContent, "thisImgs" => $thisImgs]);
//
//        }

    }
}
