<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>{{ env('SITE_NAME') }} | Password reset</title>

	<link rel="stylesheet" href="/css/admin.css">
</head>
<body>
<div class="container-fluid login-container">
	<div class="panel panel-primary">
		<div class="panel-heading">Password reset</div>
		<div class="panel-body">
			<form role="form" method="POST" action="{{ route('password.email') }}">
				{{ csrf_field() }}

				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
					<label for="email" class="control-label">E-Mail Address</label>

					<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

					@if ($errors->has('email'))
						<span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
					@endif
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">
						Send Password Reset Link
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>
