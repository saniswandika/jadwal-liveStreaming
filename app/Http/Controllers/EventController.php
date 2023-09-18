<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    private $checkRoles ;

    public function __construct()
    {
        $this->checkRoles = new RoleController;
    }
    public function index(Request $request)
    {   

        $checkRoles = $this->checkRoles->getRoles();
        $events = Event::all();

        return response()->json($events);
    }
}
