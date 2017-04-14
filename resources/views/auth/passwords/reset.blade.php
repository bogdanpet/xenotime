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
			<form class="form-horizontal" role="form" method="POST" action="{{ route('password.request') }}">
				{{ csrf_field() }}

				<input type="hidden" name="token" value="{{ $token }}">

				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
					<label for="email" class="control-label">E-Mail Address</label>

					<input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

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

				<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
					<label for="password-confirm" class="control-label">Confirm Password</label>

					<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

					@if ($errors->has('password_confirmation'))
						<span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
					@endif
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">
						Reset Password
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>
