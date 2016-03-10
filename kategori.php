<?php 
$id = $_GET['id'];
$query = "select * from kategori where id_kategori='".$id."'";
$sql = $koneksi->prepare($query);
$sql->execute();
$result = $sql->fetch(PDO::FETCH_ASSOC); 

 ?>
 <div class="konten">
 	<div class="col-md-12">
 		<h1><?php echo $result['judul_kategori'] ?></h1>
 		<p style="color:#bbb"><?php echo $result['keterangan'] ?></p>
 		<hr>
 	</div>
 </div>