@extends('dashboard.app')
@section('content')


<div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mt-2">Add New</h3>
       
      </div>
      <div class="card-body">
        <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <input  name='name_uz'  type="text" class="form-control  @error('name_uz') is-invalid @enderror"  placeholder="NAME UZ" required>
              
              @error('name_uz')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <input name='name_ru' type="text" class="form-control @error('name_ru') is-invalid @enderror" placeholder="NAME RU" required>
              @error('name_ru')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
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