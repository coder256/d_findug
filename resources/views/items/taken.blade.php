@extends('layout')

@section('title', 'Taken Items')

@section('content')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="mb-3 card card-body text-center">
                <h3>Taken Items</h3>
            </div>
            @if(!$items->isEmpty())
                <p>
                    <button id="download-button" class="btn btn-info">Download CSV</button>
                </p>
                <table style="width: 100%;" id="example"
                       class="table table-hover table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Found in</th>
                        <th>Active</th>
                        <th>Created on</th>
                        <th>Approve</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td><img src="{{ asset('items/' . $item->main_image) }}" width="100px" /></td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->found_in }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ date('m/d/Y', strtotime($item->created_at)) }}</td>
                            <td>
                                <form action="{{ route('item.approve', $item->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="1">
                                    <button class="btn btn-outline-success" type="submit"><span class="fa fa-check"></span> Approve</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('item.destroy', $item->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('item.show', $item->id) }}" class="btn btn-info"><i
                                                class="fa fa-eye"></i></a>
                                    @if (in_array(Auth::user()->role, array('admin', 'manager')))
                                        {{--<a href="{{ route('item.edit', $item->id) }}" class="btn btn-warning"><i
                                                    class="fa fa-edit"></i></a>--}}
                                        <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i>
                                        </button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Found in</th>
                        <th>Active</th>
                        <th>Created on</th>
                        <th>Approve</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                </table>
            @else
                {{--<a href="{{ route('item.create') }}" class="mb-2 mr-2 btn btn-success">Create</a>--}}
                <div class="alert alert-warning">
                    <h4 class="text-center"><span class="fa fa-box-open"></span> No Results</h4>
                </div>
            @endif
        </div>
    </div>
@endsection