<!-- app/views/nerds/edit.blade.php -->

@extends('templates.dashboard1')

@section('content')

<h1>Ubah Stok {{ $sisabisa->Nama }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($sisabisa, array('route' => array('sisabisa.update', $sisabisa->id), 'method' => 'PUT')) }}

<div class="box">
<div class="box-body">
    <div class="form-group">
        {{ Form::label('stok', 'Stok') }}
        {{ Form::number('stok', $sisabisa->Stok, array('class' => 'form-control', 'placeholder' => 'Stok saat ini')) }}
    </div>
</div>
</div>

    {{ Form::submit('Ubah', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}


@endsection
