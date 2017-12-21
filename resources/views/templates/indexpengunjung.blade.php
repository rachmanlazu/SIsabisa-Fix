@extends('templates.dashboard1')

@section('content')

<h2> Daftar Riwayat Kunjungan </h2>

<div class="box">
  <div class="box-body">
                    <table class="table table-bordered">
                      <thead>
                         <tr>
                            <th>Tanggal kunjungan</th>
                            <th>Nama rombongan</th>
                            <th>Jumlah pengunjung</th>

                            
                        </tr>
                      </thead>
                      <tbody>
                    @foreach($kunjungans as $kunjungan)
                        <tr>
                            <td>{{ $kunjungan->tanggal}}</td>
                            <td>{{ $kunjungan->nama}}</td>
                            <td>{{ $kunjungan->jumlah}}</td>
                            <td>
                                <a class="btn btn-info" href="{{ URL::to('pengunjung/' . $kunjungan->id . '/edit')}}">Ubah</a>
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                        </table>

                  </div>
                </div>

@endsection
