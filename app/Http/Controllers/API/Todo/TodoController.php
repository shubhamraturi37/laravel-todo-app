<?php

namespace App\Http\Controllers\API\Todo;

use App\Http\Controllers\Controller;
use App\Http\Requests\Todo\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $user = $request->user();

        $todos = $user->with(['todos'])->where('id', $user->id)->get();
        return response()->json([
            'data' => $todos,
        ]);
        // return Todo::with(['usersData'])->where('user_id',$request->user()->id)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param TodoRequest $request
     * @return JsonResponse
     */
    public function create(TodoRequest $request): JsonResponse
    {
        $todo = new Todo();
        $todo->fill($request->payload());
        $todo->save();
        return response()->json([
            'data' => $todo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TodoRequest $request
     * @param Todo $todo
     * @return JsonResponse
     */
    public function update(TodoRequest $request, Todo $todo): JsonResponse
    {
        $todo->update($request->validated());
        return response()->json([
            'data' => $todo->refresh(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Todo $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {

        $todo->update(['status' => 0]);
        return response()->noContent();

    }
}
