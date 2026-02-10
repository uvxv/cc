<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        $this->authorize('viewAny', User::class);
        return response()->json(User::all());
    }

    public function store(Request $request)
    {
        $this->authorize('create', User::class);
        $model = User::create($request->all());
        return response()->json($model, 201);
    }

    public function show($id)
    {
        $model = User::findOrFail($id);
        $this->authorize('view', $model);
        return response()->json($model);
    }

    public function update(Request $request, $id)
    {
        $model = User::findOrFail($id);
        $this->authorize('update', $model);
        $model->update($request->all());
        return response()->json($model);
    }

    public function destroy($id)
    {
        $model = User::findOrFail($id);
        $this->authorize('delete', $model);
        $model->delete();
        return response()->json(null, 204);
    }
}
