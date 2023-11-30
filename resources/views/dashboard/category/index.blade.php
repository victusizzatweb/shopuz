@extends('dashboard.app')
@section('content')


<div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mt-2">All Categories</h3>
        <a href="{{route("category.create")}}" class="btn btn-success float-right">Add New</a>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Name (UZb)</th>
              <th>Name (RuS)</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name_uz}}</td>
                <td>{{$category->name_ru}}</td>
                <td>{{$category->status}}</td>
                <td style="display: flex">
                  
                  <div class="btn-group">
                    <a href="{{route("category.edit", $category->id )}}" class="btn btn-primary">
                      <i class="fa fa-edit"></i>
                    </a>
                  </div>
                  <form action="{{route("category.destroy", $category->id )}}" method="POST">
                    @csrf
                    @method('delete')
                    <button onclick="return confirm('Are you sure you want  to delete? ')" class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                  </form>
                </td>
              </tr>
                
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix">
      {{$categories->links()}}
      </div>
    </div>
    <!-- /.card -->

   
  </div>
@endsection