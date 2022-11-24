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
        $status = $request->get('status');

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
                'status' => $status
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

    public function changeStatus(Request $request)
    {
        $id = $request->get('id');
        $status = $request->get('status');

        $thisAdv = Advertisement::find($id);

        //Delete
        if ($status === 1)
        {
            $thisAdv->status = 0;
        }

        //Publish
        if ($status === 2) {
            $thisAdv->status = 1;
        }

        //To draft

        $thisAdv->save();

        if ($thisAdv->status === $status)
        {
            return response()->json([
                'success' => true
            ]);

        }   else
        {
            return response()->json([
                'success' => false
            ]);
        }
    }

    public function delAdvert(Request $request)
    {
        $id = $request->get('id');

        $delAdvert = Advertisement::find($id);

        $delAdvert->status = 0;

        $delAdvert->save();
    }

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

    }
}
