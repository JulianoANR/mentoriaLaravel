<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Role
{

    public function handle(Request $request, Closure $next, $role)
    {
        $useRole = auth()->user()->role;

        if ($useRole !== $role) {
            if ($useRole === 'participant') {
                return redirect()->route('participant.dashboard.index');
            }

            if ($useRole === 'organization') {
                return redirect()->route('organization.dashboard.index');
            }
        }

        return $next($request);
    }
}
