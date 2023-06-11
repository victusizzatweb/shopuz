@extends('dashboard.app')
@section('content')


<div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mt-2">All products</h3>
        <a href="{{route("product.create")}}" class="btn btn-success float-right">Add New</a>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Image</th>
              <th>Name (UZb)</th>
              <th>Name (RuS)</th>
              <th>Brand</th>
              <th>Category</th> 
              <th>Status</th> 
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
             
             @foreach ($products as $product)
             <tr>
                 <td>{{$product->id}}</td>    
                 <td>
                  @guest
                   @foreach ($product->images as $image )
                   <a href="{{$product->imagePath()}}{{$image->path}}">
                  
                    <img src="{{$product->imagePath()}}{{$image->path}}" alt  ="rasmni bori yeb ketti" class="img img-thumbnail" width="40px">
                   </a>

                    @endforeach
                    @endguest
                  
                 </td>
                 <td>{{$product->name_uz}}</td>
                 <td>{{$product->name_ru}}</td>
                 <td>{{$product->brand->name}}</td>
                 <td>{{$product->category->name_uz}} | {{$product->category->name_ru}}</td>
                 <td>{{$product->status}}</td>
                 <td>
                   <div class="btn-group">
                     <a href="{{route("product.edit", $product->id )}}" class="btn btn-primary">
                       <i class="fa fa-edit"></i>
                     </a>
                     <form action="{{route("product.destroy", $product->id )}}" method="POST">
                       @csrf
                       @method('delete')
                       <button onclick="return confirm('Are you sure you want  to delete? ')" class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                     </form>
                   </div>
                  
                 </td>
               </tr>
                 
             @endforeach   
           
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix">
      {{$products->links()}}
      </div>
    </div>
    <!-- /.card -->

   
  </div>
@endsection