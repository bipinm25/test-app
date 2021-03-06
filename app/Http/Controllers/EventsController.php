<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Date;

class EventsController extends BaseController
{
    public function getEventsWithWorkshops() {
        //throw new \Exception('implement in coding task 1');

        $events = Event::with('workshop')->get();
        return response()->json($events, 200);
    }

    public function getFutureEventsWithWorkshops() {
        //throw new \Exception('implement in coding task 2');

        $event = Event::whereHas('workshop',function($q){
            $q->where('start', '>=', date('Y-m-d H:i'));
        })->with(['workshop' => function($q) {
            $q->where('start', '>=', date('Y-m-d H:i'));
        }])->get();

        return response()->json($event, 200);
    }
}
