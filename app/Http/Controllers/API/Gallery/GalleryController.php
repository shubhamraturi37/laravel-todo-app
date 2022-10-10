<?php

namespace App\Http\Controllers\API\Gallery;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gallery\GalleryRequest;

use App\Http\Requests\Todo\TodoRequest;
use App\Models\Gallery;
use App\Models\Todo;
use App\Models\TodoLabel;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;


class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {


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
            $data = new Gallery();
            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('/Image'), $filename);
                $data['user_id'] = auth()->user()->id;
                $data['title'] = $request->input('title');
                $data['image'] = $filename;
            }
            $data->save();
        }catch (Exception $e){
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
     * Mark as completed resource.
     *
     * @param Todo $todo
     * @return Response
     */
    public function completed(Todo $todo): Response
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
