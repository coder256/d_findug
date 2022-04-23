@extends('layout')

@section('title', 'Admins')

@section('content')
    <div class="mb-3 card card-body text-center">
        <h3>User</h3>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <form id="form_data" method="post" action="{{ route('user.store') }}">
                @csrf
                <input name="part" type="hidden" value="data">
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="first_name">
                                <span class="text-danger">*</span> First Name
                            </label>
                            <input name="first_name" id="first_name" type="text" class="form-control"
                                   required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="last_name">
                                <span class="text-danger">*</span> Last Name
                            </label>
                            <input name="last_name" id="last_name" type="text" class="form-control"
                                   required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="tel">
                                <span class="text-danger">*</span> Tel
                            </label>
                            <input name="tel" id="tel" type="text" class="form-control" pattern="^[\+]?(\d{10}|\d{12})$"
                                   required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="email">
                                <span class="text-danger">*</span> Email
                            </label>
                            <input name="email" id="email" type="email" class="form-control"
                                   required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="role">
                                <span class="text-danger">*</span> Role
                            </label>
                            <select id="role" name="role" required class="form-control">
                                <option value="">Choose option</option>
                                <option value="admin">Admin</option>
                                <option value="manager">Manager</option>
                                <option value="data_entrant">Data Entrant</option>
                                <option value="agent">Agent</option>
                                <option value="user">User</option>
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
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
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
                            <button class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg">
                                Create
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
