<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdvanceRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        return view('advance_payment.advance');
    }

    public static function getEvent($eventid) {

        $event_ = DB::table('calender_events')->where('id', '=', $eventid)->first();

        //$test=array('a'=>'A','b'=>'B');

         // Return as json
        return $event_;

    }
}
