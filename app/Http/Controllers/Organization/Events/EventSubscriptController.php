<?php

namespace App\Http\Controllers\Organization\Events;
use App\Models\{Events, User};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventSubscriptController extends Controller
{
    public function store(Events $event, Request $request)
    {

        $user =  User::findOrFail($request->user_id);

        $user->events()->attach($event->id);

        return back()->with('success', 'Inscrição no evento realizado com sucesso!');

    }
}
