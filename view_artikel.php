<?php 
	$id = $_GET['id'];
	$query = "select *, DATE_FORMAT(tanggal_posting,'%d %M %Y') as tgl from artikel where id='".$id."'";
	$sql = $koneksi->prepare($query);
	$sql->execute();
	$result = $sql->fetch(PDO::FETCH_ASSOC); 
 ?>

 <div class="konten">
 	 <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div>
          <ul class="nav navbar-nav navbar-left tengah">
            <li class="dropdown" >
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ms Word.<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="index.php?hal=kategori&id=1">Microsoft Word</a></li>
              <li><a href="index.php?hal=kategori&id=7">Microsoft Excel</a></li>
              <li><a href="index.php?hal=kategori&id=8">Microsoft Powerpoint</a></li>
            </ul>
           <li style="border-left:1px solid #ddd;"><a href="index.php?hal=kategori&id=2">Corel Draw</a></li>
           <li style="border-left:1px solid #ddd;"><a href="index.php?hal=kategori&id=3">Photoshop</a></li>
           <li style="border-left:1px solid #ddd;"><a href="index.php?hal=kategori&id=4">Pemrograman</a></li>
           <li style="border-left:1px solid #ddd;"><a href="index.php?hal=kategori&id=5">Video Editing</a></li>
           <li style="border-left:1px solid #ddd;"><a href="index.php?hal=kategori&id=6">AutoCad</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

 </div>
	<div class="col-md-12">
		<div class="col-md-8">
			<h3><?php echo $result['judul_artikel'] ?></h3>
			<p style="color:#bbb"> diposting pada tanggal <?php echo $result['tgl'] ?></p>
			<hr>
			<p>
				<?php echo $result['isi'] ?>
			</p>
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
</div>