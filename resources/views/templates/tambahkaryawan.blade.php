@extends ('templates.dashboard')

<!DOCTYPE HTML>
<html>

@include('templates.partials._head')

<body class="cbp-spmenu-push">
	<div class="main-content">

@include('templates.partials._navbar')

@include('templates.partials._header')

 <br>
 <br>
 <br>


@section('content')
		<div class="container">
		    <div class="row">
		        <div class="col-md-8 col-md-offset-3">
		            <div class="panel panel-default">
		                <div class="panel-heading">Tambah Karyawan</div>

		                <div class="panel-body">
		                    <form class="form-horizontal" method="POST" action="{{ route('tambahuser.karyawan') }}">
		                        {{ csrf_field() }}

		                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
		                            <label for="name" class="col-md-4 control-label">Name</label>

		                            <div class="col-md-6">
		                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

		                                @if ($errors->has('name'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('name') }}</strong>
		                                    </span>
		                                @endif
		                            </div>
		                        </div>

		                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
		                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

		                            <div class="col-md-6">
		                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

		                                @if ($errors->has('email'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('email') }}</strong>
		                                    </span>
		                                @endif
		                            </div>
		                        </div>

														<div class="form-group">
		                          <label for="nim" class="col-md-4 control-label">NIM</label>

		                          <div class="col-md-6">
		                              <input id="nim" type="text" class="form-control" name="nim" value="{{ old('nim') }}" required autofocus>

		                              @if ($errors->has('nim'))
		                                  <span class="help-block">
		                                      <strong>{{ $errors->first('nim') }}</strong>
		                                  </span>
		                              @endif
		                          </div>
		                        </div>

		                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
		                            <label for="password" class="col-md-4 control-label">Password</label>

		                            <div class="col-md-6">
		                                <input id="password" type="password" class="form-control" name="password" required>

		                                @if ($errors->has('password'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('password') }}</strong>
		                                    </span>
		                                @endif
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

		                            <div class="col-md-6">
		                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
		                            </div>
		                        </div>

														<div class="form-group">
		                            <div class="col-md-6">
		                                <input type="hidden" class="form-control" name="role" value="Karyawan" required>
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <div class="col-md-6 col-md-offset-4">
		                                <button type="submit" class="btn btn-primary">
		                                    Tambah
		                                </button>
		                            </div>
		                        </div>
		                    </form>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>

@include('templates.partials._script')

</div>

</body>
</html>
