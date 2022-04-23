@extends('layout')

@section('title', 'Items')

@section('content')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="mb-3 card card-body text-center">
                <h3>Item</h3>
            </div>
            <form>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="name">Name</label>
                            <input name="name" id="name" type="text" class="form-control"
                                   value="{{ $item->name }}" disabled="disabled">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="found_in">Where did you find this item</label>
                            <input name="found_in" id="found_in" type="text" class="form-control"
                                   value="{{ $item->found_in }}" disabled="disabled">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="found_in">Main Image</label>
                            <img src="{{ asset('items/' . $item->main_image) }}" width="100%" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <hr>
                        <p>Main Image</p>
                    </div>
                    @foreach(explode(',', $item->other_images) as $other_image)
                        <div class="col-md-6" style="margin-bottom: 10px;">
                            <div class="card border-primary">
                                <div class="card-body">
                                    <img src="{{ asset('items/' . $other_image) }}" width="100%" />
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </form>
        </div>
    </div>
@endsection
