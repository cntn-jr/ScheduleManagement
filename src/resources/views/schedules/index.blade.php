@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-5 mx-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">{{ __('今日の予定') }}</div>

                    <div class="card-body">
                        <schedule-list :schedules={{$today_schedules}} at-time='今日'></schedule-list>
                    </div>
                </div>
            </div>

            <div class="col-md-5 mx-4">
                <div class="card">
                    <div class="card-header bg-success text-white">{{ __('一週間の予定') }}</div>

                    <div class="card-body">
                        <schedule-list :schedules={{$week_schedules}} at-time='一週間'></schedule-list>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection