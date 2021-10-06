@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-5 mx-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">{{ __('今日の予定') }}</div>

                    <div class="card-body">
                        <schedule-list :schedules='@json($today_schedules)' at-time='今日'></schedule-list>
                    </div>
                </div>
            </div>

            <div class="col-md-5 mx-4">
                <div class="card">
                    <div class="card-header bg-success text-white">{{ __('一週間の予定') }}</div>

                    <div class="card-body">
                        <schedule-list :schedules='@json($week_schedules)' at-time='一週間'></schedule-list>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-5">

            <div class="col-md-5 mx-4">
                <div class="card">
                    <div class="card-header bg-info text-white">{{ __('最近追加した予定') }}</div>

                    <div class="card-body">
                        <schedule-list :schedules='@json($recent_add_schedules)' at-time='最近追加した'></schedule-list>
                    </div>
                </div>
            </div>

            <div class="col-md-5 mx-4">
                <div class="card">
                    <div class="card-header bg-success text-white">{{ __('今の天気') }}</div>

                    <div class="card-body">
                        <weather-component></weather-component>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection