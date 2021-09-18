<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
    {
        $user = Auth::user();
        if($user->id != $user_id)
            return redirect()->route('schedule.index')->with('error_message', 'アクセス権限がありません');
        return view('User.edit')->with(['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $user_id)
    {
        $user = Auth::user();
        if($user->id != $user_id)
            return redirect()->route('schedule.index')->with('error_message', 'アクセス権限がありません');
        $request->validate([
            'name' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'max:100', Rule::unique('users')->ignore($user->id)],
        ],[
            'name.required' => '名前は必ず入力して下さい',
            'name.max' => '名前は２０文字以内です',
            'email.required' => 'メールアドレスは必ず入力して下さい',
            'email.max' => 'メールアドレスは１００文字以内です',
            'email.unique' => 'そのメールアドレスは既に使用されています'
        ]);
        $user = User::find($user_id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        return redirect()->route('user.edit', $user_id)->with('success_message', 'プロフィールを更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
