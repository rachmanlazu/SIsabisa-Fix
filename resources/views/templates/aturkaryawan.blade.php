
@extends('templates.dashboard1')

@section('content')

<?php use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator; ?>

<h1>Ubah Status Karyawan {{ $karyawan->name }} </h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($karyawan, array('route' => array('karyawan.update', $karyawan->id), 'method' => 'PUT')) }}

<div class="box">
<div class="box-body">
  <div class="form-group">
      {{ Form::label('name', 'Nama Karyawan') }}
      {{ Form::text('name', $karyawan->name, array('class' => 'form-control', 'placeholder' => 'Nama Karyawan')) }}
  </div>

  <div class="form-group">
      {{ Form::label('nim', 'NIM') }}
      {{ Form::text('nim', $karyawan->nim, array('class' => 'form-control', 'placeholder' => 'NIM')) }}
  </div>


    <div class="form-group">
        {{ Form::label('status', 'Aktif') }}
        {{ Form::radio('status', $karyawan->status=0, true, array('class' => 'field')) }}
    </div>
    <div class="form-group">
        {{ Form::label('status', 'Non-aktif') }}
        {{ Form::radio('status', $karyawan->status=1, array('class' => 'field')) }}
    </div>

</div>
</div>

    {{ Form::submit('Ubah', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@endsection
