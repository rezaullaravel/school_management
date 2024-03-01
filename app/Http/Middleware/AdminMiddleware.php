<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(Session::get('adminId')){
            return $next($request);
        } elseif(Session::get('teacherId')){
            return redirect()->route('teacher.dashboard');
        }  elseif(Session::get('studentId')){
            return redirect('/student/dashboard');
        } else{
            return redirect('/admin/login');
        }
    }
}
