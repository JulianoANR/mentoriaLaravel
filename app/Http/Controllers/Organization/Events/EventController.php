<?php

namespace App\Http\Controllers\Organization\Events;

use App\Http\Controllers\Controller;
use App\Models\Event;
use APP\Http\Requests\Organization\Event\EventRequest;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        return view('organization.events.index');
    }

    public function create(){
        return view('organization.events.create');
    }

    public function store(EventRequest $request){

        Eve-nt::create($request->validated());

        return redirect()->route('organization.events.index')->with('success', 'Evento cadastrado com sucesso!');
    }
}
