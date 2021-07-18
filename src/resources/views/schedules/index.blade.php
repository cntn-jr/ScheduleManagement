@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($schedules as $schedule)
            <p class="text-center">{{$schedule->title}}</p>
        @endforeach
    </div>
@endsection