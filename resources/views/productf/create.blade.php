
@extends('layout')

@section('title', 'Add New Product')

@section('content')

<br><br>
<section class="p-3" style="min-height:calc(100vh - 112px)">
  <div class="message"></div>
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">
                      <h3 class="card-title m-0 float-left">Add New Product</h3>
                      <a href="/productf" class="btn btn-success float-right">All Students</a>
                  </div>
        <div class="card-body">

          {{-- @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif --}}

          <div class="mb-2">
            <form action="{{ route('productf.store')}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
              @csrf
        <label for="gender" class="form-label">Gender</label>
        <select class="form-select"  value="{{old('gender')}}" name="gender" class="@error('gender') is-invalid @enderror" >
        @error('gender') <p class="invalid-feedback"> {{ $message}} </p> @enderror
          <option selected disabled value="">Select</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
          <option value="other">Other</option>
        </select>
      </div>
      <div class="mb-2">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control"  value="{{old('name')}}" name="name"class="@error('name') is-invalid @enderror"  placeholder="Enter name">
        @error('name') <p class="invalid-feedback"> {{ $message}} </p> @enderror
      </div>
      <div class="mb-2">
        <label for="sku" class="form-label">SKU</label>
        <input type="text" class="form-control" value="{{old('sku')}}" name="sku" class="@error('sku') is-invalid @enderror"  placeholder="Enter SKU">
        @error('sku') <p class="invalid-feedback"> {{ $message}} </p> @enderror

      </div>
      <div class="mb-2">
        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control" value="{{old('price')}}" name="price" class="@error('price') is-invalid @enderror"  placeholder="Enter price">
        @error('price') <p class="invalid-feedback"> {{ $message}} </p> @enderror

      </div>
      <div class="mb-2">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control"  value="{{old('description')}}" name="description" rows="3"class="@error('description') is-invalid @enderror"  placeholder="Enter description"></textarea>
        @error('description') <p class="invalid-feedback"> {{ $message}} </p> @enderror
        
      </div>
      <div class="mb-2">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control" name="image"   class="@error('price') is-invalid @enderror">
        @error('image') <p class="invalid-feedback"> {{ $message}} </p> @enderror

      </div>
      <button  class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</section>
  @endsection