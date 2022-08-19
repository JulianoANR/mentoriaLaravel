<?php

namespace App\Services;

class UserService
{
    public static function getDashboardRouteBasedOnUserRole($userRole)
    {
        if ($userRole === 'organization') {
            return redirect()
                ->route('organization.dashboard.index');
        }
        if ($userRole === 'participant') {
            return redirect()
                ->route('participant.dashboard.index');
        }
    }
}
