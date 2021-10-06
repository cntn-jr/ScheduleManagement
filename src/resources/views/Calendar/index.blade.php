@extends('layouts.app')

@section('content')

    <div class="container">
        <calendar-component :schedules='@json($schedules)'></calendar-component>
    </div>
@endsection