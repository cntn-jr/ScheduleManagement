@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('今日の予定') }}</div>

                    <div class="card-body">
                        @empty($schedules)
                            <p class="alert alert-warning text-center">今日の予定はありません</p>
                        @else
                            <table class="table table-striped">
                                @foreach($schedules as $schedule)
                                    <tr>
                                        <td class="col text-center">
                                            {{$schedule->title}}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @endempty
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection