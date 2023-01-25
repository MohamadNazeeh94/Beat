@extends('layouts.app-master')

@section('content')
<div class="d-flex justify-content-center align-items-center py-5">
    <main class="form-box p-3">
        <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">  
            
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            
            <h1 class="h3 mb-3 fw-normal">Add Product</h1>

            @include('layouts.partials.messages')

            <div class="form-group">
                <input type="file" name="image" class="form-control-file" id="image">
                <label for="image">Product Image</label>
            </div>

            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" required="required" autofocus>
                <label for="floatingName">Product Name</label>
                @if ($errors->has('name'))
                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                @endif
            </div>
            
            <div class="form-group form-floating mb-3">
                <textarea class="form-control" name="description">Description</textarea>
                <label for="floatingPassword">Description</label>
                @if ($errors->has('description'))
                    <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                @endif
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Create</button>
            
        </form>
    </main>
</div>
@endsection