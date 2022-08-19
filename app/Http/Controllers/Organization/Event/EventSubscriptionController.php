<?php

namespace App\Http\Controllers\Organization\Event;

use App\Http\Controllers\Controller;
use App\Models\{Event, User};
use App\Services\EventService;
use Illuminate\Http\Request;

class EventSubscriptionController extends Controller
{
    public function store(Event $event, Request $request){
        $user = User::findOrFail($request->user_id);
        if(EventService::userSubscribedOnEvent($user,$event)){
            return back()->with('warning', 'Este participante já está inserido no evento!');
        }
        if(EventService::eventEndDateHasPassed($event)){
            return back()->with('warning', 'O evento já ocorreu! Data inválida!');
        }
        if(EventService::eventParticipantsLimitHasReached($event)){
            return back()->with('warning', 'O limite de participantes já foi excedido');
        }

        $user->events()->attach($event);

        return back()->with('success', 'Inscrição no evento realizada com sucesso!');
    }

    public function destroy(Event $event, User $user){
        if(!EventService::userSubscribedOnEvent($user,$event)){
            return back()->with('warning', 'Este participante não está inserido no evento!');
        }
        if(EventService::eventEndDateHasPassed($event)){
            return back()->with('warning', 'O evento já ocorreu! Data inválida!');
        }

        $user->events()->detach($event->id);

        return back()->with('success', 'Inscrição no evento removida com sucesso!');
    }
}
