@extends('frontend.app')


@section('content')
    <!-- Navbar Start -->
    <div class="container-fluid ">
      <div class="row border-top px-xl-5">
          <div class="col-lg-3 d-none d-lg-block">
            @if(isset($categories))
            <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                <h6 class="m-0">Categories</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
           
              <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                  <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                    @foreach ($categories as $category)
                             <a href="{{route('index')}}?cat={{$category->name_uz}}" class="nav-item nav-link">{{$category->name_uz}}</a>
                    @endforeach
                  </div>
                 
              </nav>
            @endif
            
          </div>
          <div class="col-lg-9">
              <div id="header-carousel" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                    @php
                        $counter = 0
                    @endphp
                    @if ($product != null)
                            @foreach ($product->images as $image)
                            <div class="carousel-item {{$counter++ ===0?'active':''}}" style="height: 410px;">
                                <img class="img-fluid " style = "background-size: cover"src="{{$product->imagePath()}}{{$image->path}}" alt="Image">
                                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                    <div class="p-3" style="max-width: 700px;">
                                        <h4 class="text-light text-uppercase font-weight-medium mb-3">{{ substr(strip_tags($product->discreption_uz), 0, 100) }}...</h4>
                                        <h3 class="display-4 text-white font-weight-semi-bold mb-4">{{$product->name_uz }}</h3>
                                        <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            
                            @endforeach
                    @endif
                   
                  <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                      <div class="btn btn-dark" style="width: 45px; height: 45px;">
                          <span class="carousel-control-prev-icon mb-n2"></span>
                      </div>
                  </a>
                  <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                      <div class="btn btn-dark" style="width: 45px; height: 45px;">
                          <span class="carousel-control-next-icon mb-n2"></span>
                      </div>
                  </a>
              </div>
          </div>
      </div>
  </div>
  <!-- Navbar End -->
   <!-- Products Start -->
   <div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2"> Trandy Products</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">
       @foreach ($products as $product)
       <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
        <div class="card product-item border-0 mb-4">
            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                @php
                    $images= $product->images->toArray()
                @endphp
                <img class="img-fluid w-100" src="{{$product->imagePath()}}{{$images[0]['path']}}" alt="">
            </div>
            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                <h6 class="text-truncate mb-3">{{$product->name_uz }}</h6>
                <div class="d-flex justify-content-center">
                    <h6>{{$product->price }}    UZS</h6><h6 class="text-muted ml-2"></h6>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between bg-light border">
                <a href="{{route('single', $product->id)}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                <a href="{{route('single', $product->id)}}" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
            </div>
        </div>
        </div>
     @endforeach
    </div>
</div>
<!-- Products End -->
@endsection
