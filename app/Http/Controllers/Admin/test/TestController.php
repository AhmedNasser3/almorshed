<?php

namespace App\Http\Controllers\admin\test;

use Illuminate\Http\Request;
use App\Models\admin\test\Test;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function index(){
        return view('admin.pages.test.create');
    }

    public function create(){
        return view('admin.pages.test.create');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Test::create($validatedData);

    }

    public function edit(Request $request, $TestId){
        $test = Test::findOrFail($TestId);
        return view('admin.pages.test.edit', compact('test'));
    }

    public function update(Request $request, $TestId){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $test = Test::findOrFail($TestId);
        $test->update($validatedData);

    }

    public function delete($TestId){
        $test = Test::findOrFail($TestId);
        $test->delete();

    }
}