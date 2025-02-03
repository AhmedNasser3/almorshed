<?php

namespace App\Http\Controllers\admin\doctorService;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\admin\doctorService\DoctorService;
use App\Models\admin\service\Service;
use App\Models\User;

class DoctorServiceController extends Controller
{
    public function create(){
        $doctors = User::where('role' , 'moderator')->get();
        $services = Service::all();
        return view('admin.pages.doctorService.create',compact('doctors','services'));
    }
    public function store(Request $request)
    {
        // التحقق من صحة المدخلات
        $validator = Validator::make($request->all(), [
            'user_id', // تحقق من وجود الطبيب في جدول الأطباء
            'service_id' => 'required|exists:services,id', // تحقق من وجود الخدمة في جدول الخدمات
            'available_days' => 'required|string', // تحقق من أن الأيام المدخلة هي نص
            'available_hours' => 'required|array', // تحقق من أن ساعات العمل هي مصفوفة
            'unavailable_hours' => 'required|array', // تحقق من أن ساعات غير المتاحة هي مصفوفة
            'price' => 'required|string', // تحقق من أن السعر هو نص
        ]);

        // في حال كانت هناك أخطاء في التحقق من المدخلات
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            // إنشاء سجل جديد في جدول doctor_services
            DoctorService::create([
                'user_id' => $request->user_id,
                'service_id' => $request->service_id,
                'available_days' => $request->available_days,
                'available_hours' => json_encode($request->available_hours), // تحويل المصفوفة إلى JSON
                'unavailable_hours' => json_encode($request->unavailable_hours), // تحويل المصفوفة إلى JSON
                'price' => $request->price,
            ]);

            // إعادة التوجيه مع رسالة نجاح
            return redirect()->route('doctor-services.create')->with('success', 'تم إضافة الخدمة للطبيب بنجاح.');
        } catch (\Exception $e) {
            // إعادة التوجيه مع رسالة خطأ
            return redirect()->back()->with('error', 'حدث خطأ أثناء إضافة الخدمة للطبيب.');
        }
    }
}