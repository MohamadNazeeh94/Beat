@extends('layouts.app-master')

@section('content')
    <div class="p-5">
        <div class="d-flex justify-content-between flex-wrap">
            <h1>Beat Task</h1>
            <div>
                @if (Auth::user()->type == 'seller')
                    <a href="{{ route('product.create') }}" class="btn btn-primary">Create Product</a>
                @endif
            </div>
        </div>
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th width="100px">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <script type="text/javascript">
    $(function () {
        
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('home.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'image', name: 'image'},
                {data: 'name', name: 'name'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
        
    });
    </script>
@endsection