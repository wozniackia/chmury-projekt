<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Support\Facades\DB;

class FleetController extends Controller
{
    public function fleet()
    {

        $fleetList = Vehicle::all();

        return view('fleet', ['fleetList' => $fleetList]);
    }
}
