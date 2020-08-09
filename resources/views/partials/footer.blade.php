
  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Project 6 Apps
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; {{ date('Y')}} <a href="#">Xtremewebdesign.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('plugins/moment/moment.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}" defer></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js')}}"></script>
<script src="{{ asset('js/tempusdominus-bootstrap-4.min.js')}}" defer></script>

@livewireScripts
@yield('datatable_scripts')
@yield('otherscripts')

<script src="{{ asset('plugins/select2/js/select2.full.min.js')}}" defer></script>
<script>
    $(document).ready(function() {

        $('.select2').select2();
        //Initialize Select2 Elements
        $('.select2bs4').select2({
          theme: 'bootstrap4'
        });

          //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'YYYY-MM-DD HH:mm'
    })

      //Timepicker
      $('#timepicker2').datetimepicker({
      format: 'YYYY-MM-DD HH:mm'
    })

    });

  </script>


</body>
</html>
