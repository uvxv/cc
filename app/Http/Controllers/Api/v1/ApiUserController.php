<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ApiUser;

class ApiUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        $this->authorize('viewAny', ApiUser::class);
        return response()->json(ApiUser::all());
    }

    public function store(Request $request)
    {
        $this->authorize('create', ApiUser::class);
        $model = ApiUser::create($request->all());
        return response()->json($model, 201);
    }

    public function show($id)
    {
        $model = ApiUser::findOrFail($id);
        $this->authorize('view', $model);
        return response()->json($model);
    }

    public function update(Request $request, $id)
    {
        $model = ApiUser::findOrFail($id);
        $this->authorize('update', $model);
        $model->update($request->all());
        return response()->json($model);
    }

    public function destroy($id)
    {
        $model = ApiUser::findOrFail($id);
        $this->authorize('delete', $model);
        $model->delete();
        return response()->json(null, 204);
    }
}
