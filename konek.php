<?php 
$servername = "localhost";
$username = "root";
$password = "123456";

try {
	$koneksi = new PDO("mysql:host=$servername;dbname=inasaba", $username, $password);
	$koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	?>
	<script type="text/javascript">console.log("koneksi sukses")</script>
	<?
}
catch(PDOException $e)
{
	echo "Connection failed: " . $e->getMessage();
}

?>