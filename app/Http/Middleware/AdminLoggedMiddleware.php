<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminLoggedMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if(!session()->has('admin')){
            return redirect()->route('admin.login')->withErrors('izinsiz giriş davar');
        }

        $updateTheAdmin = Admin::where('id', session()->get('admin')->id)->first();
        session()->put('admin', $updateTheAdmin);  //güncel tutmak için.. 
        
        return $next($request);
    }
}
