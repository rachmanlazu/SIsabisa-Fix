<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->

      <!-- search form -->

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

        <li class="header">MAIN NAVIGATION</li>

          <a href="{{ URL::to('beranda') }}">
            <i class="fa fa-dashboard"></i>
            <span>Dashboard</span>
          </a>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i>
            <span>Stok Barang</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('sisabisa.index') }}"><i class="fa fa-circle-o"></i> Ubah Stok</a></li>
            <li><a href="{{ URL::to('sisabisa/create') }}"><i class="fa fa-circle-o"></i> Tambah Stok</a></li>

          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span>Kunjungan Tamu</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ URL::to('pengunjung/create') }}"><i class="fa fa-circle-o"></i> Tambah Kunjungan</a></li>
            <li><a href="{{ route('pengunjung.index') }}"><i class="fa fa-circle-o"></i> Lihat Kunjungan</a></li>
            <!-- <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Grafik Pengunjung</a></li> -->
          </ul>
        </li>

        @if($role=='Administrator')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Karyawan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li @if ($active == 'show') class="active" @endif><a href="{{ route('daftar-karyawan.show') }}"><i class="fa fa-circle-o"></i>List Karyawan</a></li>
            <li @if ($active == 'post') class="active" @endif><a href="{{ route('post.pekerja')}}"><i class="fa fa-circle-o"></i>Tambah Karyawan</a></li>
          </ul>
        </li>
        @endif

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
