<?php

namespace App\Http\Controllers\admin\home;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminHomeController extends Controller
{
    public function index(){
        $users = User::where('role', 'user')->get();
        $doctors = User::where('role', 'moderator')->get();
        $admins = User::where('role', 'admin')->get();
        $moderators = User::where('role', 'moderator')->get();
        return view('admin.home.index', compact('doctors','users','admins','moderators'));
    }
}