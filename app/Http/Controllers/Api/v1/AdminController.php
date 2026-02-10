<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        $this->authorize('viewAny', Admin::class);
        return response()->json(Admin::all());
    }

    public function store(Request $request)
    {
        $this->authorize('create', Admin::class);
        $model = Admin::create($request->all());
        return response()->json($model, 201);
    }

    public function show($id)
    {
        $model = Admin::findOrFail($id);
        $this->authorize('view', $model);
        return response()->json($model);
    }

    public function update(Request $request, $id)
    {
        $model = Admin::findOrFail($id);
        $this->authorize('update', $model);
        $model->update($request->all());
        return response()->json($model);
    }

    public function destroy($id)
    {
        $model = Admin::findOrFail($id);
        $this->authorize('delete', $model);
        $model->delete();
        return response()->json(null, 204);
    }

    public function manageAdmins()
    {
        $this->authorize('manageAdmins', Admin::class);
        return response()->json(['ok' => true]);
    }
}
