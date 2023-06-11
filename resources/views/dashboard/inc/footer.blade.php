
  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="/dashboard/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/dashboard/dist/js/adminlte.min.js"></script>
<!-- Summernote -->
<script src="/dashboard/plugins/summernote/summernote-bs4.min.js"></script>
<!-- SweetAlert2 -->
<script src="/dashboard/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="/dashboard/plugins/toastr/toastr.min.js"></script>
<script>
  $(function() {
  
    $('#description_uz').summernote()
    $('#description_ru').summernote()
});
</script>

@if (\Session::has('create'))
<script>
   $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
  $(function() {
     Toast.fire({
       icon: 'success',
       title: 'Successfully added'
      });
     });
 });

</script>
@endif

@if (\Session::has('delete'))
<script>
   $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
  $(function() {
     Toast.fire({
       icon: 'error',
       title: 'Successfully delete'
      });
     });
 });

</script>
@endif

@if (\Session::has('update'))
<script>
   $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
  $(function() {
     Toast.fire({
       icon: 'warning',
       title: 'Successfully update'
      });
     });
 });

</script>
@endif
</body>
</html>
