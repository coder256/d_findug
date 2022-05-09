@extends('home.layout')

@section('title', 'Search')

@section('content')
    <div class="container mb-5" style="padding-top: calc(2rem + 100px)">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <form action="{{ route('home.search') }}" method="post">
                    <div class="row">
                        <div class="col-8"><input type="text" placeholder="Search" class="form-control"></div>
                        <div class="col"><button class="btn btn-success">Search</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        @if(!$items->isEmpty())
            @foreach($items as $item)
                <div class="row mb-3">
                    <div class="col-2">
                        <img src="{{ asset('items/' . $item->main_image) }}" width="100px" />
                    </div>
                    <div class="col-4">
                        <span>{{$item->name}}</span> <br>
                        <span>Found In: {{ $item->found_in }}</span> <br>
                        <span class="text-muted">Date Found: {{ date('d-M-Y', strtotime($item->created_at)) }}</span>
                    </div>
                </div>
            @endforeach
        @else
            <div class="alert alert-warning">
                <h4 class="text-center"><span class="fa fa-box-open"></span> No Results</h4>
            </div>
        @endif
    </div>
@endsection