@extends('layouts.parent')

@section('content')

<div class="container">
  <div class="card">
    <div class="card-body">
        <h5 class="card-title">Create Product</h5>
       
            <div class="col-12">
                <label for="inputNanme4" class="form-label">Your Name</label>
                <input type="text" class="form-control" id="inputNanme4" name="name"
                    value="{{ $product->name }}" readonly>
            </div>
            <div class="col-12">
                <label for="inputNanme4" class="form-label">Price</label>
                <input type="number" class="form-control" id="inputNanme4" name="price" min="0"
                    value="{{ $product->price }}" readonly>
            </div>

            <div class="col-12">
              <label for="inputNanme4" class="form-label">Category Product</label>
              <input type="text" class="form-control" id="inputNanme4" name="price" min="0"
                  value="{{ $product->category->name }}" readonly>
            </div>
            
            <div class="col-12 mt-2">
                <textarea name="description" id="description" cols="30" rows="10" readonly>{!! $product->description !!}</textarea>
            </div>
            
            <div class="text-end">
              <a href="{{ Route('dashboard.product.index') }}">
                <button type="submit" class="btn btn-primary mt-2">Back</button></a>
            </div>
        
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'description' );
</script>


    
@endsection