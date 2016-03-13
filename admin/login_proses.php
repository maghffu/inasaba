<?php 
session_start();
$g = isset($_GET['op'])?$_GET['op']:"";
if ($g=='proses') {
	session_destroy();
}else{

	$user = $_POST['username'];
	$pass = $_POST['password'];

	if ($user == 'siswa' && $pass=='siswa') {
		$_SESSION['username'] = $user;
	}
}

header("Location: index.php");

?>