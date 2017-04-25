@extends('admin/layouts/master')

@section('main')
	<main>

		<div class="submenu">
			<ul class="nav nav-tabs">
				<li class="active"><a href="{{ admin_url('posts') }}">Posts</a></li>
				<li><a href="{{ admin_url('posts/create') }}">Create post</a></li>
			</ul>
		</div>

		<div class="panel panel-default" style="border-top: none;">
			<div class="table-responsive">
				{!! $datatable->show() !!}
			</div>
		</div>
	</main>
@endsection