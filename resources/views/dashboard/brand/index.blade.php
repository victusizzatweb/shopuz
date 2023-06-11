@extends('dashboard.app')
@section('content')


<div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mt-2">All Brands</h3>
        <a href="{{route("brand.create")}}" class="btn btn-success float-right">Add New</a>
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
                    <a href="{{route("brand.edit", $brand->id )}}" class="btn btn-primary">
                      <i class="fa fa-edit"></i>
                    </a>
                    <form action="{{route("brand.destroy", $brand->id )}}" method="POST">
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
      {{$brands->links()}}
      </div>
    </div>
    <!-- /.card -->

   
  </div>
@endsection