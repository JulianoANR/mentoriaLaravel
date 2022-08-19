<?php

namespace App\Services;

use App\Models\Events;
use App\Models\User;

class EventsService
{
    public static function userSubscribeOnEvent(User $user, Events $event){
        return $user->events()->where('id', $event->id)->exists();
    }

}
