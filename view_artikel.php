<?php 
	$id = $_GET['id'];
	$query = "select *, DATE_FORMAT(tanggal_posting,'%d %M %Y') as tgl from artikel where id='".$id."'";
	$sql = $koneksi->prepare($query);
	$sql->execute();
	$result = $sql->fetch(PDO::FETCH_ASSOC); 
 ?>

 <div class="konten container">
	<div class="col-md-12">
		<h3><?php echo $result['judul_artikel'] ?></h3>
		<p style="color:#bbb"> diposting pada tanggal <?php echo $result['tgl'] ?></p>
		<hr>
		<p>
			<?php echo $result['isi'] ?>
		</p>
	</div>
</div>