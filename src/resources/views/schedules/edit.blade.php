@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-header bg-primary text-white">{{ __('予定の追加') }}</div>

                    <div class="card-body">
                        <form action="{{route('schedule.update', $schedule->id)}}" method="post">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="input-group col-10 mx-auto my-4">
                                <span class="input-group-text col-2 bg-info text-white">予定日</span>
                                <input type="date" name="scheduledDate"
                                class="form-control
                                @error('scheduledDate') is-invalid @enderror" value="{{old('scheduledDate') ?? $schedule->scheduledDate }}">
                                @error('scheduledDate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-group col-10 mx-auto my-4">
                                <span for="title" class="input-group-text col-2 bg-info text-white">タイトル</span>
                                <input type="text" class="form-control
                                @error('title') is-invalid @enderror"
                                name="title" id="title" value="{{old('title') ?? $schedule->title}}">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-group col-10 mx-auto my-4">
                                <span class="input-group-text col-2 bg-info text-white">予定内容</span>
                                <textarea class="form-control
                                @error('content') is-invalid @enderror" name="content"
                                rows="4" style="resize: none;">{{old('content') ?? $schedule->content}}</textarea>
                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-10 my-4 mx-auto d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary mr-4">変更</button>
                            </div>
                        </form>
                    </div>

            </div>
        </div>
    </div>
@endsection