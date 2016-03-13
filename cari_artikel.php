<?php 
	$q = $_POST['query'];
 ?>
 <br>
<div class="konten">
	<div class="col-md-12">
		<h4>Hasil Pencarian : "<?php echo $q ?>" </h4>
		<hr>
	</div>
</div>
<div class="col-md-12">
	<div class="col-md-8" style="border-right:1px solid #ddd; margin-bottom:20px;">
		<?php 
		$query = "select *, DATE_FORMAT(tanggal_posting,'%d %M %Y') as tgl 
			from artikel join kategori on artikel.id_kategori = kategori.id_kategori
			where judul_artikel like '%".$q."%' or judul_kategori like '%".$q."%' ";
		$sql = $koneksi->prepare($query);
		$sql->execute();
		$result = $sql->fetchAll(); 
		foreach ($result as $data) {
			?>

			<div class="col-md-4">
				<div class="panel panel-primary">
					<div class="panel-heading"><?php echo $data['judul_artikel'] ?></div>
					<div class="panel-body">
						<?php echo substr($data['isi'], 0,150)."... <a href='index.php?hal=view&id=".$data['id']."'>Baca Selengkapnya.</a>"; ?>
						<br>

					</div>
					<div class="panel-footer"><p>Diposting pada <?php echo $data['tgl']; ?></p></div>
				</div>
			</div>

			<?
		} ?>
	</div>
	<div class="col-md-4">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading"><i class="glyphicon glyphicon-star"></i>Artikel Terbaru</div>
				<div class="panel-body">
					<table class="table table-hover">
						<?php 
						$id = $_GET['id'];
						$query = "select * from artikel order by tanggal_posting desc limit 7";
						$sql = $koneksi->prepare($query);
						$sql->execute();	           
						$result = $sql->fetchAll();  	
						foreach ($result as $r) {
							?>
							<tr>
								<td><a href="index.php?hal=view&id=<?php echo $r[id];?>"><?php echo $r['judul_artikel']; ?> </a></td>
							</tr>
							<?
						}
						?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
