@if($status==0)
  @extends ('templates.dashboard1')
  @section('content')

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
@endsection

@else
    <h1>Anda Sudah Tidak Aktif</h1>
@endif

</html>
