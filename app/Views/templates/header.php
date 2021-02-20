<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<title>eCab</title>
	<link rel="stylesheet" href="http://localhost/ecabcardio/public/css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />
	<link rel="stylesheet" href="/ecabcardio/public/css/style.css">
	<link rel="stylesheet" href="/ecabcardio/public/css/styleL.css">
	<link href="/ecabcardio/public/css/media.css" media="screen, print" rel="stylesheet" type="text/css" >
</head>

<header>
	<nav class="navbar">
		<a href="home"><img src="/ecabcardio/public/assets/logo.png" alt="logo" class="navbar logo" /></a>
		<ul class="navbar menu">
			<li class="patients-tab"><a href="/ecabcardio/public/patients">Patients</a> </li>
			<li class="history-tab"><a href="/ecabcardio/public/history">History</a></li>
			<li class="admin-tab" onclick="dropdownMenu()"><a href="#admin">Admin</a></li>
		</ul>
		<ul class="drop-menu" style="display: none;">
			<li><a href="/ecabcardio/public/">Edit Users</a></li>
			<li><a href="http://localhost/ecabcardio/public/admin/examinations">Edit Examinations</a></li>
			<li><a href="/ecabcardio/public/">Edit Analysis</a></li>
		</ul>
	</nav>
</header>

<body>