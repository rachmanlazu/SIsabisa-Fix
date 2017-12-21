@extends('templates.dashboard1')

@section('content')

<?php use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator; ?>

<h1>Tambah Komoditas Baru</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

<div class="box">
    <div class="box-body">
{{ Form::open(array('url' => 'sisabisa')) }}

    <div class="form-group">
        {{ Form::label('nama', 'Nama') }}
        {{ Form::text('nama', Input::old('nama'), array('class' => 'form-control', 'placeholder' => 'Nama komoditas')) }}
    </div>

    <div class="form-group">
        {{ Form::label('stok', 'Stok (Kg)') }}
        {{ Form::number('stok', Input::old('stok'), array('class' => 'form-control', 'placeholder' => 'Stok komoditas')) }}
    </div>
    </div>
</div>

    {{ Form::submit('Tambah', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@endsection
