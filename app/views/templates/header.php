<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= $data['judul']; ?></title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.8/datatables.min.css" rel="stylesheet">
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="#" onclick="location.reload(true)">PHP MVC</a>

			<!-- Tombol Log Out -->
			<ul class="navbar-nav ms-auto">
				<li class="nav-item">
					<a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modalLogout"><i class="bi bi-box-arrow-right"></i> Logout</a>
				</li>
			</ul>
		</div>
	</nav>