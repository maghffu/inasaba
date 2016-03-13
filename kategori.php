<?php 
$id = $_GET['id'];
$query = "select * from kategori where id_kategori='".$id."'";
$sql = $koneksi->prepare($query);
$sql->execute();
$result = $sql->fetch(PDO::FETCH_ASSOC); 

?>

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox" style="height:300px; margin-top:50px;">
        <div class="item active">
          <img src="image/html5-logo.jpg" alt="...">
          <div class="carousel-caption">
            Belajar Html5
          </div>
        </div>
        <div class="item">
          <img src="image/twitter_bootstrap.jpg" alt="...">
          <div class="carousel-caption">
            Belajar Bootstrap
          </div>
        </div>

      </div>

      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>


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


<div class="konten">
	<div class="col-md-8">
		<h1><?php echo $result['judul_kategori'] ?></h1>
		<p style="color:#bbb"><?php echo $result['keterangan'] ?></p>
		<hr>
		<div class="col-md-12">
	
		<?php 
		$query = "select *, DATE_FORMAT(tanggal_posting,'%d %M %Y') as tgl from artikel where id_kategori='".$id."'";
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
