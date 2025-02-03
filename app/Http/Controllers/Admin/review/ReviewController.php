<?php

namespace App\Http\Controllers\admin\review;

use Illuminate\Http\Request;
use App\Models\admin\review\Review;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $doctor_id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string',
        ]);

        // تخزين المراجعة في قاعدة البيانات
        Review::create([
            'review' => $request->review,
            'rating' => $request->rating,
            'doctor_id' => $doctor_id,
            'user_id' => Auth::id(),
        ]);

        return back()->with('success', 'تم إرسال التقييم بنجاح');
    }

}