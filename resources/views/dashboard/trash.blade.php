@extends('dashboard.app')
@section('content')


<div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mt-2">All delete products</h3>
        <form action="{{route('trash')}}" method="GET">
        <div class="form-group col-6 d-flex ">
          <input type="search" name="key" id="" placeholder="Search" class="form-control">
          <input type="submit" name="submit" class="btn btn-primary" value="search">
        </div>
      </form>
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
                  <img src="{{$product->imagePath()}}" alt="rasmni bori yeb ketti" class="img img-thumbnail" width="150">
                </td>
                <td>{{$product->name_uz}}</td>
                <td>{{$product->name_ru}}</td>
                <td>{{$product->brand->name}}</td>
                <td>{{$product->category->name_uz}} | {{$product->category->name_ru}}</td>
                <td>{{$product->status}}</td>
                <td>
                  <div class="btn-group">
                    
                    <form action="{{route("product.restore", $product->id )}}" method="POST">
                      @csrf
                      @method('PUT')
                      <button onclick="return confirm('Are you sure you want  to restore this item? ')" class="btn btn-danger" type="submit">
                        <i class="fa-solid fa-trash-can-arrow-up">#</i></button>
                    </form>
                  </div>
                </td>
              </tr>
             @endforeach
           </tbody>
         </table>
         <div class="card-footer clearfix">
          {{$products->links()}}
          </div>
        </div>
       </div>
      </div>
    </div>
  </div>

<div class="col-md-6">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title mt-2">All delete brands</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body"> 
      <table class="table table-bordered">
        <thead>
          <tr>
            <th style="width: 10px">#</th>
            <th>Name</th> 
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($brands as $brand)
          <tr>
              <td>{{$brand->id}}</td>   
              <td>{{$brand->name}}</td>
              <td>
                <div class="btn-group">
                  
                  <form action="{{route("brand.restore", $brand->id )}}" method="POST">
                    @csrf
                    @method('PUT')
                    <button onclick="return confirm('Are you sure you want  to restore this item? ')" class="btn btn-danger" type="submit">
                      <i class="fa-solid fa-trash-can-arrow-up">#</i></button>
                  </form>
                </div>
              </td>
            </tr>
           @endforeach
         </tbody>
       </table>
       <div class="card-footer clearfix">
        {{$brands->links()}}
        </div>
      </div>
     </div>
    </div>
  </div>

 
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mt-2">All delete categories</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Name (UZb)</th>
              <th>Name (RuS)</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name_uz}}</td>
                <td>{{$category->name_ru}}</td>
                <td>
                  <div class="btn-group">
                    
                    <form action="{{route("category.restore", $category->id )}}" method="POST">
                      @csrf
                      @method('PUT')
                      <button onclick="return confirm('Are you sure you want  to restore this item? ')" class="btn btn-danger" type="submit">
                        <i class="fa-solid fa-trash-can-arrow-up">#</i></button>
                    </form>
                  </div>
                </td>
              </tr>
             @endforeach
           </tbody>
         </table>
         <div class="card-footer clearfix">
          {{$categories->links()}}
          </div>
        </div>
       </div>
      </div>
    </div>
  </div>

@endsection