<?php

namespace App\Http\Controllers\admin\reservation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\doctorService\DoctorService;

class ReservationController extends Controller
{
    //view
    public function index($id){
        $doctorService = DoctorService::findOrFail($id);
        $availableDays = explode(',', $doctorService->available_days);
        return view('frontend.reservation.index', compact('doctorService', 'availableDays'));
    }
}