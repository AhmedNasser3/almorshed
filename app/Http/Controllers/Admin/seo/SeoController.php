<?php

namespace App\Http\Controllers\admin\seo;

use App\Http\Controllers\Controller;
use App\Models\admin\seo\Seo;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    public function index(){
        $seos = Seo::all();
        return view('admin.pages.seo.index',compact('seos'));
    }
    public function create(){
        return view('admin.pages.seo.create');
    }
    public function store(Request $request){
        $request->validate([
            'meta_description' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
        ]);
        Seo::create($request->all());
        return redirect()->route('seo.index');
    }
    public function edit(){
        return view('admin.pages.seo.edit');
    }
    public function update(Request $request,$seoId){
        $request->validate([
            'meta_description' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
        ]);

        $seoId->update($request->all());
        return redirect()->route('seo.index');
    }
    public function delete($seoId){
        $seo = Seo::findOrFail($seoId);
        $seo->delete();
        return redirect()->route('seo.index');
    }
}