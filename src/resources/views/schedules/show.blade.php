@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-5 mx-4">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">{{$schedule->title}}</div>

                    <div class="card-body">
                        <div class="row col">
                            予定日<span class="mx-auto">{{$schedule->scheduledDate}}</span>
                        </div>
                        <div class="mt-3">
                            メモ
                            <div class="p-1 text-center">
                                {{$schedule->content}}
                            </div>
                        </div>
                        <div class="mt-4 mx-auto text-right d-flex justify-content-end">
                            <a class="btn btn-primary mr-3" href="{{route('schedule.edit', $schedule->id)}}">編集</a>
                            <delete-modal :schedule_id='{{$schedule->id}}' :csrf='{{json_encode(csrf_token())}}'></delete-modal>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection