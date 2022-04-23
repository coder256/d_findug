@extends('layout')

@section('title', 'Items')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3 card card-body text-center">
                <h3>Item</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3 card">
                <div class="card-body">
                    <form id="form_data" method="post" action="{{ route('item.update', $item->id) }}">
                        @csrf
                        @method('PUT')
                        <input name="part" type="hidden" value="data">
                        <h3>Edit Information</h3>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="name">
                                        <span class="text-danger">*</span> Name
                                    </label>
                                    <input name="name" id="name" type="text" class="form-control"
                                           value="{{ $item->name }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="found_in">
                                        <span class="text-danger">*</span> Where did you find this item
                                    </label>
                                    <input name="found_in" id="found_in" type="text" class="form-control"
                                           value="{{ $item->found_in }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="status">
                                        <span class="text-danger">*</span> Status
                                    </label>
                                    <select id="status" name="status" required class="form-control">
                                        <option value="">Choose option</option>
                                        <option value="1" {{ (($item->status = 1) ? 'selected' : '') }}>Active</option>
                                        <option value="0" {{ (($item->status = 0) ? 'selected' : '') }}>Inactive</option>
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
        </div>
        <div class="col-md-6">
            <div class="mb-3 card">
                <div class="card-body">
                    <form id="data" method="post" action="{{ route('item.update', $item->id) }}">
                        @csrf
                        @method('PUT')
                        <input name="part" type="hidden" value="images">
                        <h3>Replace Images</h3>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="main_image">
                                        <span class="text-danger">*</span> Main image
                                    </label>
                                    <input name="main_image" id="main_image" type="file" class="form-control"
                                           required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="other_images">
                                        Other images
                                    </label>
                                    <input name="other_images[]" id="other_images" type="file" class="form-control" multiple>
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
        </div>
    </div>
@endsection
