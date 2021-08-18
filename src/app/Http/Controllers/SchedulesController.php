<?php

namespace App\Http\Controllers;

use App\Models\Schedules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $now = date('Y-m-d');
        $week_ary = [date('y-m-d', strtotime('+1 day')), date('y-m-d', strtotime('+6 day'))];
        $today_schedules = Schedules::where('user_id', $user->id)
                    ->where('scheduledDate', $now)
                    ->get();
        $week_schedules = Schedules::where('user_id', $user->id)
                    ->whereBetween('scheduledDate', $week_ary)
                    ->get();
        return view('schedules/index')
            ->with(['today_schedules'=>$today_schedules, 'week_schedules'=>$week_schedules]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schedules/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'title' => ['required', 'string', 'max:20'],
            'content' => ['required', 'string', 'max:100'],
            'scheduledDate' => ['required', 'date', 'after:today'],
        ],[
            'title.required' => 'タイトルは必ず入力して下さい',
            'title.max' => 'タイトルは２０文字以内です',
            'content.required' => '予定内容は必ず入力して下さい',
            'content.max' => '予定内容は１００文字以内です',
            'scheduledDate.required' => '予定日は必ず入力して下さい',
            'scheduledDate.after' => '予定日は明日以降です',
        ]);
        Schedules::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'scheduledDate' => date($request->input('scheduledDate')),
            'user_id' => $user->id,
        ]);
        $success_message = '予定を追加しました';
        return redirect()->route('schedule.index')->with('success_message', $success_message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\schedules  $schedules
     * @return \Illuminate\Http\Response
     */
    public function show(schedules $schedules)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\schedules  $schedules
     * @return \Illuminate\Http\Response
     */
    public function edit(schedules $schedules)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\schedules  $schedules
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, schedules $schedules)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\schedules  $schedules
     * @return \Illuminate\Http\Response
     */
    public function destroy(schedules $schedules)
    {
        //
    }
}
