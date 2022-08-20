<?php

namespace App\Http\Controllers\Organization\Event;

use App\Http\Controllers\Controller;
use App\Models\{Event, User};
use App\Services\EventService;
use Illuminate\Http\Request;

class EventSubscriptionController extends Controller
{
    public function store(Event $event, Request $request)
    {
        $user = User::findOrFail($request->user_id);

        if (EventService::userSubscribedOnEvent($user, $event)) {
            return back()->with('warning', 'Este participante ja esta inscrito neste evento!');
        }

        if (EventService::eventEndDateHasPassed($event)) {
            return back()->with('warning', 'Evento ja ocorreu!');
        }

        if (EventService::eventParticipantsLimitHasReached($event)) {
            return back()->with('warning', 'Evento cheio!');
        }

        $user->events()->attach($event->id);

        return back()->with('success', 'Inscrição no evento realizada com sucesso!');
    }


    public function destroy(Event $event, User $user)
    {
        if (EventService::eventEndDateHasPassed($event)) {
            return back()->with('warning', 'Evento ja ocorreu!');
        }

        if (!EventService::userSubscribedOnEvent($user, $event)) {
            return back()->with('warning', 'Participante não inscrito no evento');
        }

        $user->events()->detach($event->id);

        return back()->with('success', 'Inscrição no evento removida com sucesso!');
    }
}
