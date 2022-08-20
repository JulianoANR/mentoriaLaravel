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
        if (EventsService::userSubscribeOnEvent($user, $event)) {
            return back()->with('warning', 'Este participante já está inscrito neste evento!');
        }

        if (EventsService::eventeEndDateHasPassed($event)) {
            return back()->with('waning', 'Operação inválida! O enevento já ocorreu');
        }

        if (EventsService::eventParticipantsLimitHasReached($event)) {
            return back()->with('warning', 'Não foi possível inscrever o participante pois o limite de participantes foi atingido');
        }


        $user->events()->attach($event->id);

        return back()->with('success', 'Inscrição no evento realizado com sucesso!');
    }

    public function destroy(Events $event, User $users)
    {

        if (!EventsService::userSubscribeOnEvent($users, $event)) {
            return back()->with('warning', 'Este participante não está inscrito neste evento!');
        }

        if (EventsService::eventeEndDateHasPassed($event)) {
            return back()->with('waning', 'Operação inválida! O enevento já ocorreu');
        }

        //Remover o id da tabela de relação
        $users->events()->detach($event->id);

        return back()->with('sucess', 'Inscrição no evento removida com sucesso!');
    }
}
