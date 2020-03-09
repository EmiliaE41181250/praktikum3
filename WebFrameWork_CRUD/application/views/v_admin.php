<!DOCTYPE html>
<html>
<head>
<!-- untuk membuat halaman admin -->
	<title>Membuat login dengan codeigniter | www.malasngoding.com</title>
</head>
<body>
<!-- tanggapan jika login berhasil -->
	<h1>Login berhasil !</h1>
	<h2>Hai, <?php echo $this->session->userdata("nama"); ?></h2>
	<a href="<?php echo base_url('login/logout'); ?>">Logout</a>
</body>
</html>