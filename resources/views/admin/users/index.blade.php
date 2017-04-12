@extends('admin/layouts/master')

@section('main')
	<main>

		<div class="submenu">
			<ul class="nav nav-tabs">
				<li class="active"><a href="{{ admin_url('users') }}">Users</a></li>
				<li><a href="{{ admin_url('users/create') }}">Create user</a></li>
			</ul>
		</div>

		<div class="panel panel-default" style="border-top: none;">
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
					<tr>
						<th class="small">#</th>
						<th>Name</th>
						<th class="small">ID</th>
						<th class="small">Actions</th>
					</tr>
					</thead>
					<tbody>
					{!! $datatable->show() !!}
					</tbody>
				</table>
			</div>

			<div class="panel-footer text-center">
				{!! $users->render() !!}
			</div>
		</div>
	</main>
@endsection