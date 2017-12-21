<!-- app/views/nerds/index.blade.php -->
@extends('templates.dashboard1')

@section('content')

<h1>Stok Komoditas</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<div class="box">
<div class="box-body">
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Nama</td>
            <td>Stok (Kg)</td>
        </tr>
    </thead>
    <tbody>
    @foreach($sisabisas as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->Nama }}</td>
            <td>{{ $value->Stok }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->
                {{ Form::open(array('url' => 'sisabisa/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Hapus Komoditas', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}



                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->


                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->

                <a class="btn btn-small btn-info" href="{{ URL::to('sisabisa/' . $value->id . '/edit') }}">Ubah Stok</a>

                <a class="btn btn-small btn-info" href="{{ URL::to('histori-stok/' . $value->id) }}">Histori Stok</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
</div>

@endsection
