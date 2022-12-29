<?php

namespace App\Http\Controllers;


use App\Http\Resources\AdvertisementCollection;
use App\Http\Resources\AdvFileResourse;
use App\Http\Resources\AdvPrevResourse;
use App\Http\Resources\FavoriteResource;
use App\Http\Resources\UserResourse;
use App\Models\Advertisement;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdvertisementController extends Controller
{

    public function addAdvert(Request $request)
    {
        //1. Get Request
        $id = $request->get('id');
        $title = $request->get('title');
        $content = $request->get('content');
        $location = $request->get('location');
        $price = $request->get('price');
        $imageIds = $request->get('images_ids');
        $status = $request->get('status');

            //1.2. Get for sync
        $getCategory = (int)$request->get('category');
        $getTags = $request->get('tags');

        //2. Create advertisement
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
                'status' => $status,
            ]);

        if ($imageIds !== null)
        {
            $advertisement->files()->sync($imageIds);
        }

        //3. Category
        if ($getCategory !== 0)
        {
            $category = Category::find($getCategory);
            $category->advertisements()->save($advertisement);
        }

        //4. Tags
        if ($getTags !== null)
        {
            $tagsId = [];

            foreach ($getTags as $tagName)
            {
                $tag = Tag::firstOrCreate(
                    ['name' => $tagName],
                    ['created_by' => Auth::id()]
                );

                $tagsId[] = $tag->id;
            }

            $advertisement->tags()->sync($tagsId);
        }

        $advertisement->save();

        //5. Response
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

    public function redAdv(Request $request, int $id)
    {
        $thisAdv = Advertisement::find($id);

        $thisAdvInfo = new AdvPrevResourse($thisAdv);

        $files = new AdvFileResourse($thisAdv);

        return view('redAdvert', ['thisAdvContent' => $thisAdvInfo, 'files' => $files]);

    }

    public function viewAdv(int $id)
    {
        $thisAdv = Advertisement::find($id);
        $thisAdv->views++;
        $thisAdv->save();

        $user = User::find($thisAdv->author_id);

        return view('viewAdv', ['thisAdv' => $thisAdv, 'user' => $user]);
    }

    public function pagination(Request $request)
    {
        $page = $request->get('page');
        $start = $request->get('start');
        $perPage = $request->get('perPage');

        switch ($page)
        {
            case "http://plater.local/favorites#/":
                $advsGet = Auth::user()->favorites
                    ->where('status', '=', 1)
                    ->skip($start)
                    ->take($perPage);

                break;

            case "http://plater.local/cabinet#/draft":
                $advsGet = Auth::user()
                    ->advertisement
                    ->where('status', '=', 2)
                    ->skip($start)
                    ->take($perPage);
                break;

            case "http://plater.local/#/":
                $advsGet = Advertisement
                    ::where('status', '=', 1)
                    ->skip($start)
                    ->take($perPage)
                    ->get();
                break;

            case "http://plater.local/cabinet#/":
                $advsGet = Auth::user()
                    ->advertisements
                    ->where('status', '=', 1)
                    ->
        }

        if (count($advsGet) === 0)
        {
            return response()->json([
                'end' => true
            ]);

        }   else
        {
            return [
                'advs' => new AdvertisementCollection($advsGet),
                'favorites' => new FavoriteResource($advsGet)
            ];
        }
    }

    public function addFavorite(Request $request)
    {
        $id = $request->get('id');

        $adv = Advertisement::find($id);

        $user = Auth::user();

        if ($user->favorites()->find($adv))
        {
            $user->favorites()->detach($adv);

            return response()->json([
                'success' => true,
            ]);
        }   else
        {
            $user->favorites()->attach($adv);

            return response()->json([
                'success' => true,
            ]);
        }
    }
}
