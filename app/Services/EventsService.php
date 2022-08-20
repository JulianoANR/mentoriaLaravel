<?php

namespace App\Services;

use App\Models\Events;
use App\Models\User;

class EventsService
{
    public static function userSubscribeOnEvent(User $user, Events $event){
        return $user->events()->where('id', $event->id)->exists();
    }

    public static function eventStartDateHasPassed(Events $event){
        return $event->start_date < now();
    }

    public static function eventeEndDateHasPassed(Events $event){

        return $event->end_date < now();

    }

    public static function eventParticipantsLimitHasReached(Events $event){
        return $event->users->count() == $event->participant_limit;
    }

    public static function userIsPresentOnEvent(Events $event, User $user){
        $subscription = $event->users()->where('user_id', $user->id)->first();

        if(!$subscription){
            return false;
        }

        if($subscription->pivot->present){
            return true;
        }
        return false;
    }
}
