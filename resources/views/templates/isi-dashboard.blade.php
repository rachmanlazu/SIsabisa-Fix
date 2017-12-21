<!DOCTYPE html>
<html>
@if($status==0)
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
      <div class="row">

        <!-- Stok terbanyak -->
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{ $terbanyak }}</h3>
              <p>{{ $namanya }}</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a class="small-box-footer">Stok Terbanyak</a>
          </div>
        </div>
        <!-- ./col -->

        <!-- Pengunjung -->
      <!--   <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53</h3>
              <p>Dummy</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a class="small-box-footer">Pengujung Terbanyak Bulan ini</a>
          </div>
        </div> -->
        <!-- ./col -->

        <!-- Karyawan Aktif -->

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ $karyawan }}</h3>
              <p>Orang</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a class="small-box-footer">Karyawan Aktif</a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <div id="temps_div"></div>
      @linechart('Temps', 'temps_div')
      <div id="temps_div1"></div>
      @columnchart('Temps1', 'temps_div1')
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

@else
    <h1>Akun Anda Sudah Tidak Aktif</h1>
@endif
</html>
