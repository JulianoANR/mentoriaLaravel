<?php

namespace App\Http\Controllers\Organization\Events;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\{Events, User};
use App\Services\EventsService;

class EventsPresentController extends Controller
{

    public function __invoke(Events $events, User $user)
    {
        if (!EventsService::eventStartDateHasPassed($events)) {
            return back()->with('warning', 'Operação inválida! O evento ainda não iniciou');
        }

        if (EventsService::userSubscribeOnEvent($user, $events)) {
            return back()->with('warning', 'Operação inválida! Uusário não está inscrito no evento!');
        }

        $userIsPresentOnEvent = EventsService::userIsPresentOnEvent($events, $user);

        DB::table('events_user')
            ->where('events_id', $events->id)
            ->where('user_id', $user->id)
            ->update([
                'present' => $userIsPresentOnEvent ? 0 : 1
            ]);

        return back()->with(
            'success',
            $userIsPresentOnEvent ? 'Preseça removida com sucesso' : 'Presença assinada com sucesso'
        );
    }
}
