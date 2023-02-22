<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::all();
        $formattedEvents = [];

        foreach ($events as $event) {
            $formattedEvents[] = [
                'event_title' => $event->event_title,
                'event_start' => $event->event_start,
                'event_end' => $event->event_end,
                'description' => $event->description,
            ];
        }

        return response()->json($formattedEvents);
    }
 
    public function calendarEvents(Request $request)
    {
 
        switch ($request->type) {
           case 'create':
              $event = Event::create([
                  'event_title' => $request->event_title,
                  'event_start' => $request->event_start,
                  'event_end' => $request->event_end,
              ]);
 
              return response()->json($event);
             break;
  
           case 'edit':
              $event = Event::find($request->id)->update([
                  'event_title' => $request->event_title,
                  'event_start' => $request->event_start,
                  'event_end' => $request->event_end,
              ]);
 
              return response()->json($event);
             break;
  
           case 'delete':
              $event = Event::find($request->id)->delete();
  
              return response()->json($event);
             break;
             
           default:
             # ...
             break;
        }
    }
}
