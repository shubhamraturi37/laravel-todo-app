<?php

namespace App\Http\Controllers\API\Todo;

use App\Http\Controllers\Controller;
use App\Http\Requests\Todo\TodoLabelRequest;
use App\Http\Requests\Todo\TodoRequest;
use App\Models\Todo;
use App\Models\TodoLabel;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

        $todos = $user->with(['pendingTodos', 'completedTodos'])->where('id', $user->id)->get();
        return response()->json([
            'data' => $todos,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @param TodoRequest $request
     * @param TodoLabelRequest $labelRequest
     * @return JsonResponse
     */
    public function create(TodoRequest $request, TodoLabelRequest $labelRequest): JsonResponse
    {
        $todoLabel = [];
        $todo = new Todo();
        $todo->fill($request->payload());
        $todo->save();

        if ($labelRequest->hasAny('due_date', 'priority', 'notes')) {
            try {
                $todoLabel = new TodoLabel();
                $todoLabel->fill($labelRequest->payload($todo));
                $todoLabel->save();
            } catch (Exception $e) {
                $todo->delete();
                return response()->json([
                    'data' => $e,
                ]);
            }
        }

        return response()->json([
            'data' => [$todo, $todoLabel],
        ]);
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

        DB::beginTransaction();
        $todo->update($request->validated());
        $label = $request->only('notes', 'priority', 'due_date');
        if ($label) {
            try {
                $todo->todoLabel()->update($label);
                DB::commit();
            } catch (Exception $e) {
                DB::rollBack();
                return response()->json(['data' => $e,]);
            }
        }

        return response()->json([
            'data' => $todo->with(['todoLabel'])->get(),
        ]);
    }

    /**
     * Mark as completed resource.
     *
     * @param Todo $todo
     * @return Response
     */
    public function completed(Todo $todo): Response
    {

        $todo->update(['status' => 0]);
        return response()->noContent();

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
      try {
          DB::beginTransaction();
          $todo->todoLabel()->delete();
          DB::commit();
      } catch (Exception $e){
          DB::rollBack();
          return response()->json(['data'=>$e]);
      }
        return response()->json(['data'=>'success']);

    }


}
