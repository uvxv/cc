<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\License;

class LicenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        $this->authorize('viewAny', License::class);
        return response()->json(License::all());
    }

    public function store(Request $request)
    {
        $this->authorize('create', License::class);
        $model = License::create($request->all());
        return response()->json($model, 201);
    }

    public function show($id)
    {
        $model = License::findOrFail($id);
        $this->authorize('view', $model);
        return response()->json($model);
    }

    public function update(Request $request, $id)
    {
        $model = License::findOrFail($id);
        $this->authorize('update', $model);
        $model->update($request->all());
        return response()->json($model);
    }

    public function destroy($id)
    {
        $model = License::findOrFail($id);
        $this->authorize('delete', $model);
        $model->delete();
        return response()->json(null, 204);
    }

    public function approve($id)
    {
        $model = License::findOrFail($id);
        $this->authorize('approve', $model);
        $model->status = 'approved';
        $model->save();
        return response()->json($model);
    }

    public function reject($id)
    {
        $model = License::findOrFail($id);
        $this->authorize('reject', $model);
        $model->status = 'rejected';
        $model->save();
        return response()->json($model);
    }
}
