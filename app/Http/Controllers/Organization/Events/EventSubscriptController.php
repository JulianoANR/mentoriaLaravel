<?php

namespace App\Http\Controllers\Organization\Events;
use App\Models\{Events, User};
use App\Http\Controllers\Controller;
use App\Services\EventsService;
use Illuminate\Http\Request;

class EventSubscriptController extends Controller
{
    public function store(Events $event, Request $request)
    {

        $user =  User::findOrFail($request->user_id);

        //verification
        if(EventsService::userSubscribeOnEvent($user, $event)){
            return back()->with('warning', 'Este participante já está inscrito neste evento!');
        }

        $user->events()->attach($event->id);

        return back()->with('success', 'Inscrição no evento realizado com sucesso!');

    }
}
