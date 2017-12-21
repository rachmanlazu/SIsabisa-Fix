@extends('templates.dashboard1')

@section('content')

<h2> List Karyawan </h2>

<div class="box">
  <div class="box-body">
                    <table class="table table-bordered">
                      <thead>
                         <tr>
                            <th>Nama karyawan</th>
                            <th>NIM</th>
                            <th>Status</th>


                        </tr>
                      </thead>
                      <tbody>
                    @foreach($karyawans as $karyawan)
                        <tr>
                            <td>{{ $karyawan->name}}</td>
                            <td>{{ $karyawan->nim}}</td>
                            @if ($karyawan->status==0)
                              <td>Aktif</td>
                            @else ($karyawan->status==1)
                              <td>Non-Aktif</td>
                            @endif
                            <td>
                                <a class="btn btn-info" href="{{ URL::to('karyawan/' . $karyawan->id . '/edit')}}">Ubah</a>
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                        </table>

                  </div>
                </div>

@endsection
