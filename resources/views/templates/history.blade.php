<!-- app/views/nerds/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('sisabisa') }}">Lihat Stok</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('sisabisa/create') }}">Tambah Komoditas Baru</a>
      <li><a href="{{ route('pengunjung.index') }}">Laporan Pengunjung</a></li>
      <li><a href="{{ URL::to('pengunjung/create') }}">Tambah Riwayat Kunjungan</a></li>
    </ul>
</nav>

<h1>Laporan Pengunjung</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID Kunjungan</td>
            <td>Jumlah Pengunjung</td>
            <td>Hari</td>
            <td>Waktu</td>
        </tr>
    </thead>
    <tbody>
    @foreach($pengunjungs as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->Jumlah_Pengunjung }}</td>
            <td>{{ $value->Hari }}</td>
            <td>{{ $value->waktu }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->



                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>
