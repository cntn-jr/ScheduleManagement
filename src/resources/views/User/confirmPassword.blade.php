@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 mt-5">
                <div class="card">
                    <div class="card-header bg-primary text-white">{{ __('パスワード確認') }}</div>

                    <div class="card-body">
                        <form action="{{route('user.confirm_password', Auth::user()->id)}}" method="post">
                            @csrf
                            {{ method_field('POST') }}

                            @error('password_current')
                                <div class="col text-center">
                                    <span class="invalid-feedback" role="alert" style="display: block;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                </div>
                            @enderror

                            <div class="input-group col mx-auto my-4">
                                <label for="password_current" class="col-md-4 col-form-label text-md-left">{{ __('現在のパスワード') }}</label>

                                <div class="col-md-7">
                                    <input id="password_current" type="password" class="form-control @error('password_current') is-invalid @enderror" name="password_current" required>
                                </div>
                            </div>

                            <div class="col-10 my-4 mx-auto d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary mr-4">確認</button>
                            </div>
                        </form>
                    </div>

            </div>
        </div>
    </div>
@endsection