<?php

namespace App\Http\Controllers;

use App\Models\Schedules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $schedules = Schedules::where('user_id', $user->id)
                            ->get();
        return view('calendar.index')->with(['schedules'=>$schedules]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $date = date($id);
        // $this_year = date('Y', strtotime($date));
        // $this_month = date('m', strtotime($date));
        // $this_day = date('d', strtotime($date));
        // $this_date = (string)$this_year.'/'.(string)$this_month.'/'.(string)$this_day;
        // $schedules = Schedules::where('scheduledDate', $this_date)
        //             ->get();
        // return view('calendar.show')->with(['schedules'=>$schedules, 'date'=>$this_date]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showDay($year, $month, $day)
    {
        $show_date = (string)$year.'/'.(string)$month.'/'.(string)$day;
        $date = date($show_date);
        $schedules = Schedules::where('scheduledDate', $date)
                    ->get();
        return view('calendar.show')->with(['schedules'=>$schedules, 'date'=>$show_date]);
    }
}
