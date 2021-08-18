@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">{{ __('今日の予定') }}</div>

                    <div class="card-body">
                        <schedule-list :schedules={{$schedules}}></schedule-list>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection