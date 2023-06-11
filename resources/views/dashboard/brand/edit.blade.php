@extends('dashboard.app')
@section('content')


<div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mt-2"> Update item</h3>
       
      </div>
      <div class="card-body">
        <form action="{{route('brand.update', $brand->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
              <div class="form-group">
                <input  name='name_uz' value="{{old('name' , $brand->name)}}" type="text" class="form-control  @error('name') is-invalid @enderror"  placeholder="NAME" required>
              
              @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>

              
              </div>

              <div class="card-group  ">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
            <!-- /.card-body -->

            
          </form>
      
      </div>
      <div class="card-footer clearfix">
     
      </div>
    </div>
  </div>
@endsection