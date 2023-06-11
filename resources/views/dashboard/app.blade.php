@include('dashboard.inc.header');

  <div class="content-wrapper">
    <div class="content">
      <div class="container-fluid">
          <div class="row py-2">
             @yield('content')
          </div>
        </div>
    </div>
  </div>

@include('dashboard.inc.footer');