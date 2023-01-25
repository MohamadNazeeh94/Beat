@extends('layouts.app-master')

@section('content')
<div class="d-flex justify-content-center align-items-center py-5">
    <main class="form-box p-3">
        <form method="post" action="{{ route('offer.store') }}" enctype="multipart/form-data">  
            
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

            <input type="hidden" name="product" value="{{ $product }}" />
            
            <h1 class="h3 mb-3 fw-normal">Add Offer</h1>

            @include('layouts.partials.messages')

            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="price" value="{{ old('price') }}" placeholder="Price" required="required" autofocus>
                <label for="floatingName">Price</label>
                @if ($errors->has('price'))
                    <span class="text-danger text-left">{{ $errors->first('price') }}</span>
                @endif
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Submit</button>
            
        </form>
    </main>
</div>
@endsection