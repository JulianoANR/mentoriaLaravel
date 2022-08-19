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
        $user = User::finOrFail($request->user_id);

        if (EventService::userSubscribedOnEvent($event, $user)) {
            return back()->with('warning', 'Este participante já está inscrito neste evento!');
        }

        if (EventService::eventEndDateHasPassed($event)){
            return back()->with('warning','Operação inválida! O evento já ocorreu!');
        }

        if (EventService::eventPartipantLimitHasReached($event)) {
            return back()->with('warning', 'Operação inválida! O evento alcançou o limite de participantes!');
        }

        $user->events()->attach($event->id);
        return back()->with('success', 'Inscrição no evento realizada com sucesso!');
    }

    public function destroy(Event $event, User $user)
    {
        if (EventService::eventEndDateHasPassed($event)){
            return back()->with('warning','Operação inválida! O evento já ocorreu!');
        }

        if (!EventService::userSubscribedOnEvent($event, $user)) {
            return back()->with('warning', 'O participante não está inscrito neste evento!');
        }

        $user->events()->detach($event->id);

        return back()->with('success', 'Inscrição no evento removida com sucesso!');
    }
}
