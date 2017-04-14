<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>{{ env('SITE_NAME') }} | Login</title>

	<link rel="stylesheet" href="/css/admin.css">
</head>
<body>
<div class="container-fluid login-container">
	<div class="panel panel-primary">
		<div class="panel-heading">Login</div>
		<div class="panel-body">
			<form role="form" method="POST" action="{{ route('login') }}">
				{{ csrf_field() }}

				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
					<label for="email" class="control-label">E-Mail Address</label>

					<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

					@if ($errors->has('email'))
						<span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
					@endif
				</div>

				<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
					<label for="password" class="control-label">Password</label>

					<input id="password" type="password" class="form-control" name="password" required>

					@if ($errors->has('password'))
						<span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
					@endif
				</div>

				<div class="checkbox">
					<label>
						<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
					</label>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">
						Login
					</button>

					<a class="btn btn-link" href="{{ route('password.request') }}">
						Forgot Your Password?
					</a>
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>
