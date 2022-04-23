@extends('layout')

@section('title', 'Items')

@section('content')
    <div class="mb-3 card card-body text-center">
        <h3>Item</h3>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <form id="form_data" method="post" enctype="multipart/form-data" action="{{ route('item.store') }}">
                @csrf
                <input name="part" type="hidden" value="data">
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="name">
                                <span class="text-danger">*</span> Name
                            </label>
                            <input name="name" id="name" type="text" class="form-control"
                                   required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="found_in">
                                <span class="text-danger">*</span> Where did you find this item
                            </label>
                            <input name="found_in" id="found_in" type="text" class="form-control"
                                   required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="main_image">
                                <span class="text-danger">*</span> Main image
                            </label>
                            <input name="main_image" id="main_image" type="file" class="form-control"
                                   required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="other_images">
                                Other images
                            </label>
                            <input name="other_images[]" id="other_images" type="file" class="form-control" multiple>
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
