<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $type)
    {
        if($request->user()->role->name != 'admin'){

            return $type == 'api' ? response()->json(['msg' => 'Access denied'], 401) : redirect()->back();
        }

        return $next($request);
    }
}
