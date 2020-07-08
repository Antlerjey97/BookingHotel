<?php

namespace App\Http\Middleware;

use App\Partner;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class authPartner
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $userId = Auth::user()->id;
        $partner = Partner::where('user_id', $userId)->first();
        if (@$partner->Status == 1) {
            return $next($request);
        }
        return redirect('/');
    }
}
