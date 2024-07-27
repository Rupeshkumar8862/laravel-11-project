@extends('layout')

@section('title', 'Edit Student')

@section('content')
<section class="p-3" style="min-height:calc(100vh - 112px)">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title m-0 float-left">Edit  Product</h3>
                        <a href="{{route('productf.index')}}" class="btn btn-info float-right">All Product</a>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                     

                        <div class="card-body">
                           {{-- {{ $fetchdata->name;}} --}}
                            <div class="mb-2">
                              <form action="{{route('productf.update',$fetchdata->id)}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                          <label for="gender" class="form-label">Gender</label>
                          <select class="form-select"  value="{{old('gender')}}" name="gender" class="@error('gender') is-invalid @enderror" >
                          @error('gender') <p class="invalid-feedback"> {{ $message}} </p> @enderror
                            <option selected disabled value="">Select</option>
                            <option value="male" {{($fetchdata->gender == 'male') ? 'selected' : '';}} name="gender"> Male</option>
                            <option value="female" {{($fetchdata->gender == 'female') ? 'selected' : '';}} >Female</option>
                            <option value="other"  {{($fetchdata->gender == 'other') ? 'selected' : '';}} >Other</option>
                          </select>
                        </div>
                        <div class="mb-2">
                          <label for="name" class="form-label">Name</label>
                          <input type="text" class="form-control"  value="{{ old('name', $fetchdata->name  )}}" name="name"class="@error('name') is-invalid @enderror"  placeholder="Enter name">
                          @error('name') <p class="invalid-feedback"> {{ $message}} </p> @enderror
                        </div>
                        <div class="mb-2">
                          <label for="sku" class="form-label">SKU</label>
                          <input type="text" class="form-control" value="{{old('sku', $fetchdata->sku )}}" name="sku" class="@error('sku') is-invalid @enderror"  placeholder="Enter SKU">
                          @error('sku') <p class="invalid-feedback"> {{ $message}} </p> @enderror</div>
                        <div class="mb-2">
                          <label for="price" class="form-label">Price</label>
                          <input type="number" class="form-control" value="{{old('price',$fetchdata->price)}}" name="price" class="@error('price') is-invalid @enderror"  placeholder="Enter price">
                          @error('price') <p class="invalid-feedback"> {{ $message}} </p> @enderror</div>
                        <div class="mb-2">
                          <label for="description" class="form-label">Description</label>
                          <textarea class="form-control"  name="description" rows="3"class="@error('description') is-invalid @enderror"  placeholder="Enter description">
                            {{old('description',$fetchdata->description)}}
                        </textarea>
                          @error('description') <p class="invalid-feedback"> {{ $message}} </p> @enderror 
                        </div>
                        <div class="mb-2">
                          <label for="image" class="form-label">Image</label>
                          <input type="file" class="form-control" name="image"   class="@error('price') is-invalid @enderror">
                          @error('image') <p class="invalid-feedback"> {{ $message}} </p> @enderror
                          @if ($fetchdata->image !='')
                          <img class="w-50" src="{{  asset('upload/productsupload/'.$fetchdata->image)  }}" alt=""> @endif
                        </div>
                        <button  class="btn btn-primary">Update</button>
                      </form>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection