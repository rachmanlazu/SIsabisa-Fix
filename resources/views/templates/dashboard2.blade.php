
@include("templates.partials.head")
<body class="hold-transition skin-red-light sidebar-mini">
<div class="wrapper">

  @include("templates.partials.navbar")
  <!-- Left side column. contains the logo and sidebar -->
  @include("templates.partials.sidebar")

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      @yield('content')
    <!-- /.content -->
    </section>
  </div>
  <!-- /.content-wrapper -->
  @include('templates.partials.footer')

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<!-- ./wrapper -->

<!-- jQuery 3 -->
@include('templates.partials.script')
</body>
