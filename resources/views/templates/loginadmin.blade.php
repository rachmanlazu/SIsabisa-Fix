@guest
<!DOCTYPE HTML>
<html>

@include('templates.partials._head')

<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page login-page ">
				<h3 class="title1">Sabisa Farm</h3>
				<div class="widget-shadow">
					<div class="login-top">
						<h4>Administrator Login</h4>
					</div>

					<div class="login-body">
						<form action="{{ route('login') }}" method="post">
    				{{ csrf_field() }}

						<form>
						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<input id="email" type="text" class="user" name="email" placeholder="Enter your email" value="{{ old('email') }}" required autofocus>
							<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
							@if ($errors->has('email'))
									<span class="help-block">
											<strong>{{ $errors->first('email') }}</strong>
									</span>
							@endif
						</div>

						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							<input id="password" type="password" class="lock" name="password" placeholder="password" required>
							<span class="glyphicon glyphicon-lock form-control-feedback"></span>
							@if ($errors->has('password'))
									<span class="help-block">
											<strong>{{ $errors->first('password') }}</strong>
									</span>
							@endif
						</div>

							<input type="submit" name="Sign In" value="Sign In" action="/loginme">
							<div class="forgot-grid">
								<label class="checkbox"><input type="checkbox" name="checkbox" {{ old('remember') ? 'checked' : '' }}><i></i>Remember me</label>
								<div class="forgot">
									<a href="{{ route('password.request') }}">forgot password?</a>
								</div>
								<div class="clearfix"> </div>
							</div>
						</form>
					</div>
				</div>

				<div class="login-page-bottom">
					<div class="social-btn"></div>
					<div class="social-btn sb-two"></div>
				</div>
			</div>
		</div>

	<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.js"> </script>
</html>
@endguest
