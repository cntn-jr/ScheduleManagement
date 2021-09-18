@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 mt-5">
                <div class="card">
                    <div class="card-header bg-primary text-white">{{ __('プロフィールの編集') }}</div>

                    <div class="card-body">
                        <form action="{{route('user.update', Auth::user()->id)}}" method="post">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="input-group col-10 mx-auto my-4">
                                <span class="input-group-text col-2 bg-info text-white">名前</span>
                                <input type="text" name="name"
                                class="form-control
                                @error('name') is-invalid @enderror" value="{{old('name') ?? Auth::user()->name }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-group col-10 mx-auto my-4">
                                <span for="email" class="input-group-text col-2 bg-info text-white">Eメール</span>
                                <input type="text" class="form-control
                                @error('email') is-invalid @enderror"
                                name="email" id="email" value="{{old('email') ?? Auth::user()->email}}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-10 my-4 mx-auto d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary mr-4">更新</button>
                            </div>
                        </form>
                    </div>

            </div>
        </div>
    </div>
@endsection