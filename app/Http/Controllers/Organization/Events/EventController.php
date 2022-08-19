<?php

namespace App\Http\Controllers\Organization\Events;

use App\Http\Controllers\Controller;
use App\Models\{Events, User};
use App\Http\Requests\Organization\Event\EventRequest;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {

        $events = Events::query();

        if (isset($request->search) && $request->search !== '') {
            $events->where('name', 'like', '%' . $request->search . '%');
        }

        return view('organization.events.index', [
            'events' => $events->paginate(5),
            'search' => isset($request->search) ? $request->search : ''
        ]);
    }

    public function create()
    {
        return view('organization.events.create');
    }

    public function store(EventRequest $request)
    {

        Events::create($request->validated());

        return redirect()
            ->route('organization.events.index')
            ->with('success', 'Evento cadastrado com sucesso!');
    }

    public function show(Events $event)
    {
        return view('organization.events.show', [
            'event' => $event,
            'allParticipantUsers' => User::query()
            ->where('role', 'participant')
            ->get()
        ]);
    }

    public function edit(Events $event)
    {

        return view('organization.events.edit', [
            'event' => $event
        ]);
    }

    public function update(Events $event, EventRequest $request)
    {
        $event->update($request->validated());

        return redirect()
            ->route('organization.events.index')
            ->with('success', 'Evento atualizado com sucesso');
    }

    public function destroy(Events $event)
    {
        $event->delete();

        return redirect()
            ->route('organization.events.index')
            ->with('success', 'Evento deletado com sucesso');
    }
}
