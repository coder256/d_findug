@extends('layout')

@section('title', 'Users')

@section('content')
    <div class="mb-3 card card-body text-center">
        <h3>User</h3>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <form id="form_data" method="post" action="{{ route('user.update', $user->id) }}">
                @csrf
                @method('PUT')
                <input name="part" type="hidden" value="data">
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="first_name">
                                <span class="text-danger">*</span> First Name
                            </label>
                            <input name="first_name" id="first_name" type="text" class="form-control"
                                   value="{{ $user->first_name }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="last_name">
                                <span class="text-danger">*</span> Last Name
                            </label>
                            <input name="last_name" id="last_name" type="text" class="form-control"
                                   value="{{ $user->last_name }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="tel">
                                <span class="text-danger">*</span> Tel
                            </label>
                            <input name="tel" id="tel" type="text" class="form-control" pattern="^[\+]?(\d{10}|\d{12})$"
                                   value="{{ $user->tel }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="email">
                                <span class="text-danger">*</span> Email
                            </label>
                            <input name="email" id="email" type="email" class="form-control"
                                   value="{{ $user->email }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="role">
                                <span class="text-danger">*</span> Role
                            </label>
                            <select id="role" name="role" required class="form-control">
                                <option value="">Choose option</option>
                                <option value="admin" {{ (($user->role = 'admin') ? 'selected' : '') }}>Admin</option>
                                <option value="manager" {{ (($user->role = 'manager') ? 'selected' : '') }}>Manager</option>
                                <option value="data_entrant" {{ (($user->role = 'data_entrant') ? 'selected' : '') }}>Data Entrant</option>
                                <option value="agent" {{ (($user->role = 'agent') ? 'selected' : '') }}>Agent</option>
                                <option value="user" {{ (($user->role = 'user') ? 'selected' : '') }}>User</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="status">
                                <span class="text-danger">*</span> Status
                            </label>
                            <select id="status" name="status" required class="form-control">
                                <option value="">Choose option</option>
                                <option value="1" {{ (($user->status = 1) ? 'selected' : '') }}>Active</option>
                                <option value="0" {{ (($user->status = 0) ? 'selected' : '') }}>Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group text-center">
                            <button class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg">
                                Update
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="main-card mb-3 card">
        <div class="card-body">
            <form id="data" method="post" action="{{ route('user.update', $user->id) }}">
                @csrf
                @method('PUT')
                <input name="part" type="hidden" value="pass">
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="password">
                                <span class="text-danger">*</span> Password
                            </label>
                            <input name="password" id="password" type="password" class="form-control"
                                   required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="password_confirmation">
                                <span class="text-danger">*</span> Confirm Password
                            </label>
                            <input name="password_confirmation" id="password_confirmation"
                                   type="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group text-center">
                            <button class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary
                                            btn-lg">Update
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
