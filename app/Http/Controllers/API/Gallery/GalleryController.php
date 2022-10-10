<?php

namespace App\Http\Controllers\API\Gallery;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gallery\GalleryRequest;

use App\Http\Requests\Todo\TodoRequest;
use App\Http\Traits\HasImage;
use App\Models\Gallery;
use App\Models\Todo;
use App\Models\TodoLabel;
use Carbon\Carbon;
use Exception;
use http\Url;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;


class GalleryController extends Controller
{
    use HasImage;
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $user = $request->user();

        $todos = $user->with(['galleryImage'])->where('id', $user->id)->get();
        return response()->json([
            'data' => $todos,
        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @param TodoRequest $request
     * @param GalleryRequest $labelRequest
     * @return string
     * @throws Exception
     */
    public function create(GalleryRequest $request)
    {

        try {
            DB::beginTransaction();
            $data = new Gallery();
            if ($request->file('image')) {
               $filename =  $this->setImage('gallery',$request->file('image'));
                $data['user_id'] = auth()->user()->id;
                $data['title'] = $request->input('title');
                $data['image'] = $filename;
                if(!$request->has('published_at')) {
                    $data['published_at'] = Carbon::now();
                }else{
                    $data['published_at'] = $request->input('published_at');
                }
            }
            $data->save();
           DB::commit();
        }catch (Exception $e){
            DB::rollBack();

            return response()->json(['data' => $e]);
        }
        return response()->json(['data' => $data]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param TodoRequest $request
     * @param Todo $todo
     * @param TodoLabel $todoLabel
     * @return JsonResponse
     */
    public function update(TodoRequest $request, Todo $todo, TodoLabel $todoLabel): JsonResponse
    {
      //
    }


    /**
     * Remove permanent resource.
     *
     * @param Todo $todo
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Todo $todo): JsonResponse
    {
   //

    }


}
