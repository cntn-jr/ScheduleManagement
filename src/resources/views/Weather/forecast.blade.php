@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-5">
                <weather-forecast :dates='@json($dates)'></weather-forecast>
            </div>
        </div>
    </div>
@endsection