@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('今日の予定') }}</div>

                    <div class="card-body">
                        @empty($schedules)
                            @foreach($schedules as $schedule)
                                <p class="text-center">{{$schedule->title}}</p>
                            @endforeach
                        @else
                            <p class="alert alert-warning text-center">今日の予定はありません</p>
                        @endempty
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection