<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Customer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(null === $request->user() || null === $request->user()->customer){
            return redirect()->route('customer.create')
            ->with('error', 'You need to register as a Customer first!');
        }

        return $next($request);
    }
}
