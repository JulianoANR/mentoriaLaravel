<?php

namespace App\Http\Controllers\Organization\Event;

use App\Http\Controllers\Controller;
use App\Models\{Event, User};
use Illuminate\Http\Request;
use App\Services\EventService;

class eventSubscriptionController extends Controller
{
    public function store(Event $event, Request $request){
        $user = User::findOrFail($request->user_id);

        if(EventService::userSubscribedOnEvent($user, $event)){
            return back()->with('warning', 'Erro: Este participante já está inscrito neste evento!');
        }

        if(EventService::eventEndDateHasPassed($event)){
            return back()->with('warning', 'Erro: O evento já ocorreu');
        }

        if(EventService::eventParticipantsLimitHasReached($event)){
            return back()->with('warning', 'Erro: O Limite de participantes foi atingido');
        }



        $user->events()->attach($event->id);

        return back()->with('success', $user->name.' inscreveu-se para o evento');
    }

    public function destroy(Event $event, User $user){
        if(EventService::eventEndDateHasPassed($event)){
            return back()->with('warning', 'Erro: O evento já ocorreu');
        }

        if(!EventService::userSubscribedOnEvent($user, $event)){
            return back()->with('warning', 'Erro: O participante não está inscrito');
        }

        $user->events()->detach($event->id);

        return back()->with('success', $user->name.' saiu do evento');
    }
}
