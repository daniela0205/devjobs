<?php

namespace App\Http\Controllers;

use App\Location;
use App\Position;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //

        $positions = Position::latest()->where('active',true)->take(10)->get();
        $locations = Location::all();
        return view('index.index', compact('positions', 'locations'));
    }
}
