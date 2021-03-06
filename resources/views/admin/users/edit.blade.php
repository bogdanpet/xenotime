@extends('admin/layouts/master')

@section('main')
	<main>

		<div class="submenu">
			<ul class="nav nav-tabs">
				<li><a href="{{ admin_url('users') }}">Users</a></li>
				<li><a href="{{ admin_url('users/create') }}">Create user</a></li>
			</ul>
		</div>

		<div class="panel panel-default" style="border-top: none;">
			<div class="panel-body">

				@include('admin.components.errors')

				<form action="{{ admin_url('user/edit/' . $user->id) }}" method="post">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="name" class="control-label">Name</label>
						<input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
					</div>
					<div class="form-group">
						<label for="email" class="control-label">E-mail</label>
						<input type="text" name="email" id="email" class="form-control" value="{{ $user->email }}" disabled>
					</div>
					<div class="form-group">
						<label for="password" class="control-label">Password</label>
						<input type="password" name="password" id="password" class="form-control">
					</div>
					<div class="form-group">
						<label for="password_confirmation" class="control-label">Confirm password</label>
						<input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
					</div>
					<button class="btn btn-primary">Edit user</button>
				</form>
			</div>
		</div>
	</main>
@endsection