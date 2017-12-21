<!--left-fixed -navigation-->
<div class=" sidebar" role="navigation">
        <div class="navbar-collapse">
    <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
      <ul class="nav" id="side-menu">
        <li @if ($active == 'dashboard') class="active" @endif><a href="#" ><i class="fa fa-home nav_icon"></i>Dashboard</a>
        </li>

          <!-- /nav-second-level -->
        <li class="">
          <a href="#"><i class="fa fa-book nav_icon"></i>Karyawan<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level collapse">
            <li>
              <a href="#">Daftar Karyawan</a>
            </li>
            <li @if ($active == 'post') class="active" @endif><a href="{{ route('post.pekerja')}}">Tambah Karyawan</a>
            </li>
          </ul>
        </li>

        <!-- //nav-second-level -->
        <li>
          <a href="#"><i class="fa fa-file-text-o nav_icon"></i>Barang<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level collapse">
            <li>
              <a href="#">Stok Barang</a>
            </li>
            <li @if ($active == 'post') class="active" @endif><a href="{{ route('post.barang')}}">Tambah Barang</a>
            </li>
          </ul>
          <!-- //nav-second-level -->
        </li>
        <li>
          <a href="#"><i class="fa fa-bar-chart nav_icon"></i>Pengunjung<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level collapse">
            <li>
              <a href="#">Riwayat Pengunjung</a>
            </li>
            <li>
              <a href="#">Tambah Pengunjung</a>
            </li>
          </ul>
        </li>
      </ul>
      <!-- //sidebar-collapse -->
    </nav>
  </div>
</div>
<!--left-fixed -navigation-->
