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
        $week_ary = [date('Y-m-d', strtotime('+1 day')), date('Y-m-d', strtotime('+6 day'))];
        $today_schedules = Schedules::where('user_id', $user->id)
                    ->where('scheduledDate', $now)
                    ->get();
        $week_schedules = Schedules::where('user_id', $user->id)
                    ->whereBetween('scheduledDate', $week_ary)
                    ->get();
        $recent_add_schedules = Schedules::where('user_id', $user->id)
                    ->orderBy('created_at', 'desc')
                    ->limit(3)
                    ->get();
        return view('schedules/index')
            ->with(['today_schedules'=>$today_schedules, 'week_schedules'=>$week_schedules, 'recent_add_schedules' =>$recent_add_schedules]);
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
    public function show(schedules $schedules, $id)
    {
        $user = Auth::user();
        $schedule = $schedules->find($id);
        if($user->id != $schedule->user_id){
            $error_message = 'エラーが発生しました';
            return redirect('/')->with(['error_message'=>$error_message]);
        }
        $scheduledDate = date('Y/m/d' ,strtotime($schedule->scheduledDate));
        $schedule->scheduledDate = $scheduledDate;
        return view('schedules.show')->with(['schedule'=>$schedule]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\schedules  $schedules
     * @return \Illuminate\Http\Response
     */
    public function edit(schedules $schedules, $id)
    {
        $user = Auth::user();
        $schedule = $schedules->find($id);
        if($user->id != $schedule->user_id){
            $error_message = 'エラーが発生しました';
            return redirect('/')->with(['error_message'=>$error_message]);
        }
        return view('schedules.edit')->with(['schedule'=>$schedule]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\schedules  $schedules
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, schedules $schedules, $id)
    {
        $user = Auth::user();
        $schedule = $schedules->find($id);
        if($user->id != $schedule->user_id){
            $error_message = 'エラーが発生しました';
            return redirect('/')->with(['error_message'=>$error_message]);
        }
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
        $schedule->title = $request->input('title');
        $schedule->scheduledDate = $request->input('scheduledDate');
        $schedule->content = $request->input('content');
        $schedule->save();
        $success_message = '予定を変更しました';
        return redirect()->route('schedule.index')->with('success_message', $success_message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\schedules  $schedules
     * @return \Illuminate\Http\Response
     */
    public function destroy(schedules $schedules, $id)
    {
        $user = Auth::user();
        $schedule = $schedules->find($id);
        if($schedule->user_id != $user->id) {
            $error_message = 'エラーが発生しました';
            return redirect('/')->with(['error_message'=>$error_message]);
        }
        $schedule->delete();
        $success_message = '予定を削除しました';
        return redirect()->route('calendar.index')->with(['success_message'=>$success_message]);
    }
}
