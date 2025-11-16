<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateYemenPhoneNumber
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $phone = $request->input('phone');
        
        if ($phone && !preg_match('/^967\d{9}$/', $phone)) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['phone' => 'رقم الهاتف يجب أن يبدأ ب 967 )']);
        }
        
        return $next($request);
    }
}