@extends('dashboard.app')
@section('content')


<div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mt-2">Add New</h3>
       
      </div>
      <div class="card-body">
        <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <input  name='name_uz'  type="text" value="{{old("name_uz")}}" class="form-control  @error('name_uz') is-invalid @enderror"  placeholder="NAME UZ" required>
              
              @error('name_uz')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <input name='name_ru' type="text" value="{{old("name_ru")}}" class="form-control @error('name_ru') is-invalid @enderror" placeholder="NAME RU" required>
              @error('name_ru')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <select name="category_id" class="form-control">
                  @foreach ($categories as $category)
                      <option value="{{$category->id}}">{{$category->name_uz}} | {{$category->name_ru}}</option>
                  @endforeach
                </select>
              @error('category_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <select name="brand_id" class="form-control">
                  @foreach ($brands as $brand)
                      <option value="{{$brand->id}}">{{$brand->name}}</option>
                  @endforeach
                </select>
              @error('brand_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
               <input type="file" class="form-control" multiple name="image[]">
              @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @if ($errors->any())
                  {!! implode('',$errors->all('<div style="color:red">message</div>')) !!}
                @endif
              </div>
              <div class="form-group">
                <input type="number" class="form-control" name="price" value="{{old("price")}}" placeholder="Price" required>
               @error('price')
                     <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
               </div>
               <div class="form-group">
                <label for="">Description uzb</label>
                <textarea name="description_uz" id="description_uz" cols="30" rows="10">{{old("description_uz")}}</textarea>
                @error('description_uz')
                     <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
               </div>
               <div class="form-group">
                <label for="">Description rus</label>
                <textarea name="description_ru" id="description_ru" cols="30" rows="10">{{old("description_ru")}}</textarea>
               @error('description_ru')
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