<?php

namespace App\Http\Controllers;


use App\Http\Resources\
    {AdvertisementCollection,
    AdvFileResourse,
    AdvPrevResourse,
    FavoriteResource};

use App\Models\
    {Advertisement,
    Tag,
    User};

use App\Services\Database\Advertisement\Pagination\Pages;
use App\Services\Images\Adaptiving;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AdvertisementController extends Controller
{

    public function addAdvert(Request $request)
    {
        try {
            DB::beginTransaction();

            // 1. Get Request

            $id = $request->get('id');
            $title = $request->get('title');
            $content = $request->get('content');
            $location = $request->get('location');
            $price = $request->get('price');
            $imageIds = $request->get('images_ids');
            $status = $request->get('status');

            // 1.2. Get for sync
            $getCategory = (int)$request->get('category');
            $getTags = $request->get('tags');

            // 2. Create advertisement
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
                    'category_id' => $getCategory,
                ]);

            // 3. Files
            if ($imageIds !== null)
            {
                $advertisement->files()->sync($imageIds);
            }

            // 4. Tags
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

            DB::commit();

            // 5. Response
            return response()->json([
                "success" => true,
                "redirect" => "/cabinet"
            ]);
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception;
        }
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
        $links = [];

        foreach ($thisAdv->files as $image) {
            $links[] = Adaptiving::create($image->id, 600, 500);
        }

        return view('viewAdv', ['thisAdv' => $thisAdv, 'user' => $user, 'links' => $links]);
    }

    public function pagination(Request $request)
    {
        $page = $request->get('page');
        $start = $request->get('start');
        $perPage = $request->get('perPage');
        $w = $request->get('w') ?? 260;
        $h = $request->get('h');

        // Options for search categories
        $options = $request->get('options');

//        $adv = Advertisement::where('title', 'like', ["%" . $options['wordsReq'][0] . "%"])->get();
//        dd($adv);

        if ($options !== null) {
            if (!empty($options['wordsReq']))
            {
                for ($i = 0; $i < count($options['wordsReq']); $i++)
                {

                    $advs = Advertisement::
                        where('title', 'like', ["%" . $options['wordsReq'][$i] . "%"])
                        ->where('status', '=', 1)
                        ->skip($start)
                        ->take($perPage)
                        ->get()
//                        ->whereNotNull('id')

                    ;

                    // Foreach for sql like query return null array for each wordsReq
                    if (count($advs) >= 1) {
                        // Each wordsReq have collections with model
                        // this push all models to one array
                        foreach ($advs as $adv)
                        {
                            $advsGet[] = $adv;
                        }
                    }
                }
            }

            if (!empty($options['category']))
            {

               $advsGet = Advertisement
                   ::where([
                       ['category_id', '=', $options['category']],
                       ['status', '=', 1]
                   ])
                   ->skip($start)
                   ->take($perPage)
                   ->get()

               ;
            }
        } else
        {
            $advsGet = Pages::paginate($page, $perPage, $start);
        }


        if (!isset($advsGet) || count($advsGet) === 0)
        {
            return response()->json([
                'end' => true
            ]);

        }   else
        {
            return [
                'advs' => new AdvertisementCollection($advsGet, $w, $h),
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
