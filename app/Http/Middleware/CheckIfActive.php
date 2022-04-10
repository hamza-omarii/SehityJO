<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIfActive
{

    public function handle($request, Closure $next)
    {


        if (!Auth::guard('doctor')->user()->is_active) {
            Auth::guard('doctor')->logout();
            return redirect()->route("doctor.login")->with('need_approval', trans('who_are_you.need_approval'));
        }

        return $next($request);
    }
}
