<?php

namespace App\Http\Controllers\admin\service;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\service\Service;
use Illuminate\Support\Facades\Log;

class ServiceController extends Controller
{
    public function create(){
        return view('admin.pages.service.create');
    }

    public function store(Request $request)
    {
        try {
            Service::create([
                'name' => $request->name,
                'duration' => $request->duration,
            ]);
            return redirect()->back()->with('success', 'تم إنشاء الخدمة بنجاح.');
        } catch (\Exception $e) {
            Log::error('Error creating service: ' . $e->getMessage());
            return redirect()->back()->with('error', 'حدث خطأ أثناء إنشاء الخدمة.');
        }
    }

    public function edit($serviceId){
        $service = Service::findOrFail($serviceId);
        return view('admin.pages.service.create',compact('service'));
    }
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'duration' => 'sometimes|required|string|max:255',
        ]);

        $service->update($request->all());

        return response()->json(['message' => 'Service updated successfully', 'data' => $service], 200);
    }
    public function delete(Service $service)
    {
        $service->delete();

        return response()->json(['message' => 'Service deleted successfully'], 200);
    }
}