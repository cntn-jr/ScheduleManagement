@extends('layouts.app')

@section('content')

    <div class="container">
        <calendar-component v-bind:schedules="{{$schedules}}"></calendar-component>
    </div>
@endsection