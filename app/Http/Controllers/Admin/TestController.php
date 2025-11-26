<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $tests = Test::orderBy('test_date', 'desc')->get();

        return view('admin.tests.index', compact('tests'));
    }

    public function create()
    {
        return view('admin.tests.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'test_date' => 'required|date',
        ]);

        Test::create($data);

        return redirect()->route('admin.tests.index')->with('success', 'Test date created.');
    }

    public function edit(Test $test)
    {
        return view('admin.tests.edit', compact('test'));
    }

    public function update(Request $request, Test $test)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'test_date' => 'required|date',
        ]);

        $test->update($data);

        return redirect()->route('admin.tests.index')->with('success', 'Test date updated.');
    }
}
