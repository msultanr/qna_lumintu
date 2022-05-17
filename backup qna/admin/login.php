<?php 
// Mulai session
session_start();

// Panggil file config
include '../database/connection.php';

// Check apakah terdapat post Login
if (isset($_POST['login'])) {
	// username 
	$user = htmlspecialchars($_POST['user']);
	// password
	$pass = mysqli_real_escape_string($_POST['pass']);

	// sql query 
	$id = intval($_GET['id']);
	$sql = mysqli_query($conn, "SELECT * FROM admins WHERE username ='$user' AND password='$pass'".$id);
	$cek = mysqli_num_rows($sql);

	// apakah user tersebut ada 
	if ($cek > 0) {
		// buat session login
		$_SESSION['is_login'] = true;

		// beri pesan dan dialihkan ke halaman admin
		echo "<script>document.location.href='dashboard_admin.php';</script>";
	}
	else{
		// beri pesan dan dialihkan ke halaman login
		echo "<script>document.location.href='index.php';</script>";
	}
}

?>