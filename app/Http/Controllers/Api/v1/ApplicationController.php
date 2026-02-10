<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        $this->authorize('viewAny', Application::class);
        return response()->json(Application::all());
    }

    public function store(Request $request)
    {
        $this->authorize('create', Application::class);
        $model = Application::create($request->all());
        return response()->json($model, 201);
    }

    public function show($id)
    {
        $model = Application::findOrFail($id);
        $this->authorize('view', $model);
        return response()->json($model);
    }

    public function update(Request $request, $id)
    {
        $model = Application::findOrFail($id);
        $this->authorize('update', $model);
        $model->update($request->all());
        return response()->json($model);
    }

    public function destroy($id)
    {
        $model = Application::findOrFail($id);
        $this->authorize('delete', $model);
        $model->delete();
        return response()->json(null, 204);
    }

    public function approve($id)
    {
        $model = Application::findOrFail($id);
        $this->authorize('approve', $model);
        $model->status = 'approved';
        $model->save();
        return response()->json($model);
    }

    public function reject($id)
    {
        $model = Application::findOrFail($id);
        $this->authorize('reject', $model);
        $model->status = 'rejected';
        $model->save();
        return response()->json($model);
    }
}
