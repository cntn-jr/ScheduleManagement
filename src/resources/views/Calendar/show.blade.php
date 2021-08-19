@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 mx-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">{{$date}}{{ __('の予定') }}</div>

                    <div class="card-body">
                        <schedule-list :schedules={{$schedules}} at-time='{{$date}}'></schedule-list>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection