<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PenaltyResource;
use App\Models\Penalty;
use Laravel\Dusk\Page;

class PenaltyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $this->authorize('viewAny', Penalty::class);
        return PenaltyResource::collection(Penalty::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Penalty::class);
        $model = Penalty::create($request->all());
        return response()->json($model, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = Penalty::findOrFail($id);
        $this->authorize('view', $model);
        return response()->json(new PenaltyResource($model));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $model = Penalty::findOrFail($id);
        $this->authorize('update', $model);
        $model->update($request->all());
        return response()->json($model);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = Penalty::findOrFail($id);
        $this->authorize('delete', $model);
        $model->delete();
        return response()->json(null, 204);
    }
}
