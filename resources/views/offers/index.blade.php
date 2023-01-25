@extends('layouts.app-master')

@section('content')
    <div class="p-5">
        <div class="d-flex justify-content-between flex-wrap">
            <h1>Beat Task</h1>
        </div>
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Product</th>
                    <th>Price</th>
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
            ajax: "{{ route('offer.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'user', name: 'user'},
                {data: 'product', name: 'product'},
                {data: 'price', name: 'price'},
            ]
        });
        
    });
    </script>
@endsection