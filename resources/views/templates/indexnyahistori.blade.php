<!-- app/views/nerds/index.blade.php -->
@extends('templates.dashboard1')

@section('content')

<h1>Histori Perubahan Stok</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<div class="box">
    <div class="box-body">
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Waktu update</td>
            <td>Stok awal</td>
            <td>Stok akhir</td>
            <td>Diupdate oleh</td>
        </tr>
    </thead>
    <tbody>
    @foreach($historis as $key => $value)
        <tr>
            <td>{{ $value->updated_at }}</td>
            <td>{{ $value->jumlahawal }}</td>
            <td>{{ $value->jumlahakhir }}</td>
            <td>{{ $value->pengubah }}</td>

            <td>

                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->



                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->


                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->


            </td>

            <!-- we will also add show, edit, and delete buttons -->
            

                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->
          



                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->


                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->

           

            
        </tr>
    @endforeach
    </tbody>
</table>
</div>
</div>
@endsection