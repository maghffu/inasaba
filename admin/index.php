<?php 
session_start();
include '../konek.php';
if ( empty($_SESSION['username']) ) {
	header("Location: ../index.php?hal=masuk&error=ya");
}
$query = "select * from kategori";
$sql = $koneksi->prepare($query);
$sql->execute();
$result = $sql->fetchAll(); 
?>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/bootstrap.theme.min.css">
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../ckeditor/ckeditor.js"></script>
	<script src="../ckeditor/samples/js/sample.js"></script>

</head>
<body style="padding:0px;margin:0px;">
	<div class="row" style="margin:0px;">
		<div class="col-md-8">
			<h1>Selamat datang administrator</h1>
			<hr>
			<div class="panel panel-primary">
				<div class="panel-heading"><i class="glyphicon glyphicon-plus"></i>Tambah Artikel</div>
				<div class="panel-body">
					<form class="form-horizontal" method="POST" action="index.php">
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Kategori</label>
							<div class="col-sm-10">
								<select name="id_kategori">
									<?php 
									foreach ($result as $r) {
										?>
										<option value="<?=$r['id_kategori']?>" ><?=$r['judul_kategori']?></option>
										<?
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Judul</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" placeholder="Judul Artikel" name="judul">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<div class="adjoined-bottom">
									<div class="grid-container">
										<div class="grid-width-100">
											<textarea id="editor" name="isi">
												
											</textarea>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-10">
								<button type="submit" class="btn btn-primary">Simpan</button>
							</div>
						</div>
					</form>

				</div>
			</div>
		</div>
		<div class="col-md-4">
			<?php 
			$idk = $_POST['id_kategori'];
			$jud = $_POST['judul'];
			$isi = $_POST['isi'];
			$tgl =  date('Y-m-d h:i:s');
			if (!empty($jud) && !empty($isi) ) {
				$query = "insert into artikel values('','".$jud."','".$isi."','".$tgl."','".$idk."')";
				$sql = $koneksi->prepare($query);
				$sql->execute();
			}
			$query = "select * from artikel join kategori on artikel.id_kategori = kategori.id_kategori";
			$sql = $koneksi->prepare($query);
			$sql->execute();
			$result = $sql->fetchAll();
			 ?>
		<h3>data materi</h3>
		<table class="table table-striped">
			<tr>
				<td>No</td>
				<td>Judul</td>
				<td>Isi</td>
				<td>Kategori</td>
			</tr>
			<?php 
			$n = 1;
			foreach ($result as $r) {
				?>
					<tr>
						<td><?php echo $n;$n++; ?></td>
						<td><?php echo substr($r['judul_artikel'], 0,10)."..."; ?></td>
						<td><?php echo substr($r['isi'], 0,10)."..." ?></td>
						<td><?php echo $r['judul_kategori']; ?></td>
					</tr>
				<?
			} ?>
		</table>
		</div>
	</div>
</div>


<a href="login_proses.php?op=proses">Logout</a>
</body>
</html>
<script>
	initSample();
</script>
