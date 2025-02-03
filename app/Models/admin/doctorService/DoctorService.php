<?php

namespace App\Models\admin\doctorService;

use App\Models\admin\service\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class DoctorService extends Model
{
    protected $fillable = [
        'user_id',
        'service_id',
        'available_days',
        'available_hours',
        'unavailable_hours',
        'price'
    ];

    // تحويل الأعمدة json إلى بيانات قابلة للاستخدام
    protected $casts = [
        'available_hours' => 'array',
        'unavailable_hours' => 'array',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function service(){
        return $this->belongsTo(Service::class,'service_id');
    }
}