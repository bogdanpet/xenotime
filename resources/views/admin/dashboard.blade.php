<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>{{ env('SITE_NAME') }} Admin</title>

    <link rel="stylesheet" href="css/admin.css">
</head>
<body>

<div class="topbar">
	<div class="sidebar-toggle visible-xs visible-sm"><i class="fa fa-bars"></i></div>
	<div class="topbar-title hidden-xs">{{ env('SITE_NAME') }} Admin</div>
</div>

<div class="sidebar-wrapper">
	<div class="sidebar">
		<div class="admin-navigation">
			<ul class="nav nav-stacked">
				<li><a href="{{ admin_url() }}"><i class="fa fa-home"></i> Dashboard</a></li>
				<li><a href="{{ admin_url('users') }}"><i class="fa fa-home"></i> Dashboard</a></li>
			</ul>
		</div>
	</div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>