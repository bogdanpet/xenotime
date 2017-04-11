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
				{{ $user->name }}
				{{ $user->email }}
			</div>
		</div>
	</main>
@endsection