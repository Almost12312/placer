<?php

namespace App\Http\Controllers;


use App\Http\Resources\AdvFileResourse;
use App\Http\Resources\AdvPrevResourse;
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
        $category = $request->get('category');

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

//        $advertisement->category()->dissociate($category);

        $advertisement->save($category);

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

        //Complete advert (to History)
        if ($status === 1)
        {
            $thisAdv->status = 3;
        }

        //Publish advert (To Active adverts)
        if ($status === 2)
        {
            $thisAdv->status = 1;
        }

        $thisAdv->save();

        if (!($thisAdv->status === $status))
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

        $thisAdvInfo = new AdvPrevResourse($thisAdv);


        $files = new AdvFileResourse($thisAdv);

//        $thisAdvFiles = [];
//
//        foreach ($thisAdv->files as $file) {
//            $thisAdvFiles [] = ["id" => $file["id"], "url" => $file->getUrl()];
//        }

        return view('redAdvert', ['thisAdvContent' => $thisAdvInfo, 'files' => $files]);

    }
}
