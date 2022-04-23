@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="first_name" class="col-md-4 col-form-label text-md-end">
                                <span class="text-danger">*</span> First Name
                            </label>
                            <div class="col-md-6">
                                <input name="first_name" id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                                @error('first_name')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="last_name" class="col-md-4 col-form-label text-md-end">
                                <span class="text-danger">*</span> Last Name
                            </label>
                            <div class="col-md-6">
                                <input name="last_name" id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" required autocomplete="last_name">
                                @error('last_name')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tel" class="col-md-4 col-form-label text-md-end">
                                <span class="text-danger">*</span> Tel
                            </label>
                            <div class="col-md-6">
                                <input name="tel" id="tel" type="text" class="form-control @error('tel') is-invalid @enderror" value="{{ old('tel') }}" required autocomplete="tel" pattern="^[\+]?(\d{10}|\d{12})$">
                                @error('tel')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">
                                <span class="text-danger">*</span> Email
                            </label>
                            <div class="col-md-6">
                                <input name="email" id="email" type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">
                                <span class="text-danger">*</span> Password
                            </label>
                            <div class="col-md-6">
                                <input name="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" minlength="8" required>
                                @error('password')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password_confirmation" class="col-md-4 col-form-label text-md-end">
                                <span class="text-danger">*</span> Confirm Password
                            </label>
                            <div class="col-md-6">
                                <input name="password_confirmation" id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" required autocomplete="password_confirmation" minlength="8">
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">
                                <span class="text-danger">*</span> Role
                            </label>
                            <div class="col-md-6">
                                <select name="role" id="role" class="form-control" required>
                                    <option value="">Choose option</option>
                                    <option value="data_entrant">Data Entrant</option>
                                    <option value="agent">Agent</option>
                                    <option value="user">User</option>
                                </select>
                                @error('role')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
