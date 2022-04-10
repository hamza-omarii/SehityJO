<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function ShowLoginForm()
    {
        return view('auth.login');
    }

    function create(Request $request)
    {

        $request->validate([
            'name'                       => 'required|max:50',
            'national_id_number'         => 'required|size:10|unique:users,national_id_number',
            'email'                      => 'required|email|unique:users,email',
            'phone_number'               => 'required|size:10|unique:users,phone_number',
            'password'                   => 'required|min:5|max:30',
            'password-confirm'           => 'required|min:5|max:30|same:password',
            'address'                    => 'required|max:255',
            'blood_type'                 => 'required|in:A+,A-,B+,B-,AB+,AB-,O+,O-',
            'gender'                     => 'required|in:female,male',
            'date_birth'                 => 'required|date',
        ]);

        $user  = new User();
        $user->name                = $request->input("name");
        $user->national_id_number  = $request->input("national_id_number");
        $user->email               = $request->input("email");
        $user->password            = \Hash::make($request->input("password"));
        $user->blood_type          = $request->input("blood_type");
        $user->gender              = $request->input("gender");
        $user->date_birth          = $request->input("date_birth");
        $user->address             = $request->input("address");
        $user->phone_number        = $request->input("phone_number");
        $save = $user->save();

        if ($save) {
            return redirect()->route('user.login')->with('success', 'You are now registered successfully Login Now');
        } else {
            return redirect()->route('register')->with('fail', 'Something went wrong, failed to register try again');
        }
    }

    function check(Request $request)
    {

        $request->validate([
            'national_id_number' => 'required|size:10|exists:users,national_id_number',
            'password'           => 'required|min:5|max:30',
        ], [
            'national_id_number.exists' => 'This national number is not exists on our records Go register then go back to login',
        ]);

        $creds = $request->only('national_id_number', 'password');

        if (Auth::guard('web')->attempt($creds)) {
            return redirect()->route('user.dashboard');
        } else {
            return redirect()->route('user.login')->with('fail', 'The National ID Number or Password is incorrect, Try again');
        }
    }

    function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('user.login');
    }
}
