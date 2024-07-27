@extends('layout')

@section('title', 'Product List')

@section('content')
<section class="p-3" style="min-height:calc(100vh - 112px)">
    <div class="message"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title m-0 float-left">Product List</h3>
                        <a href="productf/create" class="btn btn-success float-right">Add New</a>
                    </div>
                    <div class="card-body">
                    @if(Session::has('success'))
                        <div class="col-md-10">
                            {{-- {{Session::get('success')}} --}}
<div class="alert alert-success">
      {{Session::get('success')}}
</div>
                        </div>
                    @endif
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Gender</th>
                                    <th>Name</th>
                                  
                                    <th>sku</th>
                                    <th>price</th>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>image</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($productlist as $row)
                                <tr>
                                    <td>{{$row->id}}</td>
                                    {{-- <td>{{$row->gender}}</td> --}}
                                    <td>
                                        @if($row->gender == 'm')
                                        {{ 'Male' }}
                                    @else
                                        {{ 'Female' }}
                                    @endif
                                    </td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->sku}}</td>
                                    <td>${{$row->price}}</td>
                                    <td>{{ \carbon\carbon::parse($row->create_at)->format('d-M-Y')}}</td>
                                    <td>{{$row->description}}</td>
                                    {{-- <td> <img src="{{ $row->image}}" alt="image"></td> --}}
                                    <td>
                                        @if ($row->image !='')
                                            <img width="50px" src="{{  asset('upload/productsupload/'.$row->image)  }}" alt=""> 
                                        @endif
                                    </td>
                                    <td><a href="{{route('productf.edit',$row->id)}}" class="btn btn-dark">Edit</a></td>
                <td>                 
               
        <a href="#"onclick="deleteProduct( {{ $row->id }} ) ;" class="btn btn-danger">Delete</a>
        <form  id="delete-Product-form-{{$row->id}}" action="{{ route('productf.destroy',$row->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="card-footer"> --}}
                        {{   $productlist->links() }}
                        {{-- {{ $productlist->links('vendor.pagination.bootstrap-5') }} --}}
                        {{-- {{ $productlist->links('vendor.pagination.bootstrap-4') }} --}}
                        {{-- {{ $productlist->links('pagination::bootstrap-4') ;}} --}}
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
    <script>
        function deleteProduct(id){
        if(confirm('Are You Sure to Delete')){
        document.getElementById("delete-Product-form-"+id).submit();
        }
        }
    </script>
</section>
@endsection