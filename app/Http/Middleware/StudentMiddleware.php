<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class StudentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Session::get('studentId')){
            return $next($request);
        }
        elseif(Session::get('teacherId')){
           return redirect('/teacher/dashboard');
        } elseif(Session::get('adminId')){
            return redirect('/admin/dashboard');
        }else{
            return redirect('/student/login');
        }
    }//end method
}
