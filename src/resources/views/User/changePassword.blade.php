@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 mt-5">
                <div class="card">
                    <div class="card-header bg-primary text-white">{{ __('パスワード変更') }}</div>

                    <div class="card-body">
                        <form action="{{route('user.update_password', Auth::user()->id)}}" method="post">
                            @csrf
                            {{ method_field('PUT') }}

                            @error('password')
                                <div class="col text-center">
                                    <span class="invalid-feedback" role="alert" style="display: block;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                </div>
                            @enderror

                            <div class="input-group col mx-auto my-4">

                                <label for="password" class="col-md-4 col-form-label text-md-left">{{ __('新しいパスワード') }}</label>

                                <div class="col-md-7">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password">
                                </div>
                            </div>

                            <div class="input-group col mx-auto my-4">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-left">{{ __('パスワード（確認）') }}</label>

                                <div class="col-md-7">
                                    <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="password_confirmation">
                                </div>
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