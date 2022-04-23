@extends('layout')

@section('title', 'Users')

@section('content')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="mb-3 card card-body text-center">
                <h3>User</h3>
            </div>
            <form>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="first_name">First Name</label>
                            <input name="first_name" id="first_name" type="text" class="form-control"
                                   value="{{ $user->first_name }}" disabled="disabled">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="last_name">Last Name</label>
                            <input name="last_name" id="last_name" type="text" class="form-control"
                                   value="{{ $user->last_name }}" disabled="disabled">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="tel">Tel</label>
                            <input name="tel" id="tel" type="text" class="form-control" value="{{ $user->tel }}"
                                   disabled="disabled">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="email">Email</label>
                            <input name="email" id="email" type="email" class="form-control" value="{{ $user->email }}"
                                   disabled="disabled">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="role">Role</label>
                            <input name="role" id="role" type="text" class="form-control" value="{{ $user->role }}"
                                   disabled="disabled">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="status">Status</label>
                            <input name="status" id="status" type="text" class="form-control" value="{{ $user->status }}"
                                   disabled="disabled">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
