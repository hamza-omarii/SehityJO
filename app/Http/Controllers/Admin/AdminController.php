<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    function ShowLoginForm()
    {
        $url = 'admin';
        return view('auth.login', compact('url'));
    }

    function check(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:5|max:30',
        ], [
            'email.exists' => 'This email is not exists on our records'
        ]);

        $creds = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($creds)) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('admin.login')->with('fail', 'The Email or Password is incorrect, Try again');
        }
    }

    public function editProfile($id)
    {
        $admin = Admin::findOrFail($id);
        return view("admin.profile.edit", compact("admin"));
    }

    public function updateProfile(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $request->validate([
            "name"  => "nullable|max:255",
            "email" => "nullable|email",
            "old_password" => "required",
            'new_password' => 'nullable|min:5|max:30',
            'new_password_confirmation' => 'nullable|min:5|max:30',
        ]);

        $check = Hash::check($request->input("old_password"), $admin->password);

        if ($check) {
            $arr_without_empty = array_filter($request->all());
            $update = $admin->update($arr_without_empty);

            if ($request->has("new_password") && $request->has("new_password_confirmation")) {
                if ($request->input("new_password") === $request->input("new_password_confirmation")) {
                    $admin->password =  Hash::make($request->input("new_password"));
                    $admin->save();
                } else {
                    return redirect()->route("admin.edit.profile", $admin->id)->with("failureKey", __("flashMessage.Password does not match"));
                }
            }
            return redirect()->route("admin.dashboard")->with("successKey", __("flashMessage.Profile modified successfully"));
        } else {
            return redirect()->route("admin.edit.profile", $admin->id)->with("failureKey", __("flashMessage.The data was not entered correctly, try again"));
        }
    }

    function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
