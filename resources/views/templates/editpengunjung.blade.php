@extends('templates.dashboard1')

@section('content')

<?php use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator; ?>

<h1>Edit Riwayat Kunjungan</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($pengunjung, array('route' => array('pengunjung.update', $pengunjung->id), 'method' => 'PUT')) }}

<div class="box">
<div class="box-body">
    <div class="form-group">
        {{ Form::label('nama', 'Nama') }}
        {{ Form::text('nama', $pengunjung->nama, array('class' => 'form-control', 'placeholder' => 'Nama rombongan')) }}
    </div>

     <div class="form-group">
        {{ Form::label('jumlah', 'Jumlah') }}
        {{ Form::number('jumlah', $pengunjung->jumlah, array('class' => 'form-control', 'placeholder' => 'Jumlah pengunjung dalam rombongan')) }}
    </div>

     <div class="form-group">
        <div class='col-sm-4'>
        {{ Form::label('tanggal', 'Tanggal') }}
        {{ Form::date('tanggal', Input::old('tanggal'), array('class' => 'form-control', 'input-group date')) }}
        </div>
    </div>
</div>
</div>

    {{ Form::submit('Ubah', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@endsection
