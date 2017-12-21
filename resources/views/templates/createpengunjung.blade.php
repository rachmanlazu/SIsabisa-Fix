@extends('templates.dashboard1')

@section('content')

<?php use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator; ?>

<h1>Tambah Kunjungan Baru</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

<div class="box">
    <div class="box-body">
{{ Form::open(array('url' => 'pengunjung')) }}

    <div class="form-group">
        {{ Form::label('nama', 'Nama') }}
        {{ Form::text('nama', Input::old('nama'), array('class' => 'form-control', 'placeholder' => 'Nama rombongan')) }}
    </div>

    <div class="form-group">
        {{ Form::label('jumlah', 'Jumlah') }}
        {{ Form::number('jumlah', Input::old('jumlah'), array('class' => 'form-control', 'placeholder' => 'Jumlah pengunjung dalam rombongan')) }}
    </div>

    <div class="form-group">
        <div class='col-sm-4'>
        {{ Form::label('tanggal', 'Tanggal') }}
        {{ Form::date('tanggal', Input::old('tanggal'), array('class' => 'form-control', 'input-group date')) }}
        </div>
    </div>
</div>

    {{ Form::submit('Tambah', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@endsection