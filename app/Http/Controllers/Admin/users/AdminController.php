<?php

namespace App\Http\Controllers\Admin\users;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        $admins = User::where('role', 'admin')->get();
        return view('admin.pages.users.admins.index', compact('admins'));
    }
    public function create(){
        return view('admin.pages.users.admins.create');
    }
    public function store(Request $request){
        $request->validate([
            'admin_name' => 'required|string|max:255',
            'admin_email' => 'required|email|unique:users,email',
            'admin_password' => 'required|string|min:8',
        ]);

        $admin = new User();
        $admin->name = $request->input('admin_name');
        $admin->email = $request->input('admin_email');
        $admin->password = Hash::make($request->input('admin_password'));
        $admin->role = 'admin';
        $admin->save();

        return redirect()->route('admins.show')->with('success', 'تم إنشاء الأدمين بنجاح');
    }

    public function statusAdmin($id){
        $data = User::findOrFail($id);
        $data->role = 'user';
        $data->save();
        return redirect()->back()->with('success', 'تم تحديث الدور بنجاح');
    }
    public function destroy($id)
{
    $admin = User::findOrFail($id);
    $admin->delete();
    return redirect()->route('admins.show')->with('success', 'تم حذف الأدمين بنجاح');
}

// moderators
public function ModeratorIndex(){
    $moderators = User::where('role', 'moderator')->get();
    return view('admin.pages.users.moderators.index', compact('moderators'));
}
public function ModeratorCreate(){
    return view('admin.pages.users.moderators.create');
}
public function ModeratorStore(Request $request){
    $request->validate([
        'moderator_name' => 'required|string|max:255',
        'moderator_email' => 'required|email|unique:users,email',
        'moderator_password' => 'required|string|min:8',
    ]);

    $moderator = new User();
    $moderator->name = $request->input('moderator_name');
    $moderator->email = $request->input('moderator_email');
    $moderator->password = Hash::make($request->input('moderator_password'));
    $moderator->role = 'moderator';
    $moderator->save();

    return redirect()->route('moderators.show')->with('success', 'تم إنشاء الأدمين بنجاح');
}
public function ModeratorDestroy($id)
{
$moderator = User::findOrFail($id);
$moderator->delete();
return redirect()->route('moderators.show')->with('success', 'تم حذف الأدمين بنجاح');
}
}
