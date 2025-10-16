<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\UserModule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckModuleActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $isModuleActive = UserModule::where('user_id', '=', Auth::user()->id)
            ->where('module_id', '=', $request->route('id'))
            ->get()
            ->first();

        if(!$isModuleActive) {
            return response()->json(['error' => 'Module inactive. Please activate this module to use it.'], 403);
        }

        return $next($request);
    }
}
