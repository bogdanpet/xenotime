@extends('admin/layouts/master')

@section('main')
	<main>

		<div class="submenu">
			<ul class="nav nav-tabs">
				<li><a href="{{ admin_url('posts') }}">Posts</a></li>
				<li class="active"><a href="{{ admin_url('posts/create') }}">Create post</a></li>
			</ul>
		</div>

		<div class="panel panel-default" style="border-top: none;">
			<div class="panel-body">
				<form action="{{ admin_url('posts/create') }}" method="post">

					{{ csrf_field() }}

					@include('admin.components.errors')

					<div class="col-md-8">
						<div class="form-group">
							<label for="title" class="control-label">Title</label>
							<input type="text" name="title" id="title" class="form-control">
						</div>
					</div>

					<div class="col-md-4">
						<h3 class="form-title">Publish</h3>
						<button class="btn btn-primary">Publish</button>
					</div>
				</form>
			</div>
		</div>
	</main>
@endsection