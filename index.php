<?php 
include 'konek.php';
$hal = isset($_GET['hal'])?$_GET['hal']:"beranda";

 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $hal; ?> | Lpk Inasaba</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap.theme.min.css">
  <style type="text/css">
  @media (min-width:768px){
    .tengah{
      margin-left: 25%;
    } 
  }
  .sticky{
    margin-top: 50px;
  }
  .footer{
    margin-bottom: 0px;
    padding: 20px;
  }
  .footer1{
    background-color: #e6f7ff;
    text-align: center;
  }
  .konten{
    margin-top: 50px;
  }
  .sparator{
    margin-left: 0px;
    margin-right: 0px;
    border:1px solid black;
    padding-left: 0px;
    padding-right: 0px;
  }
  </style>
</head>
<body style="padding:0px;margin:0px;">

  <div class="row" style="margin:0px;">

    <nav class="navbar navbar-fixed-top navbar-inverse">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Brand</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

          <form class="navbar-form navbar-left tengah" action="index.php?hal=cari" method="POST" role="search">
            <div class="form-group">
              <input type="text" class="form-control" name="query" placeholder="Cari Tutorial">
            </div>
            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i></button>
          </form>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php"><i class="glyphicon glyphicon-home"></i> Home</a></li>
            <li><a href="index.php?hal=art"><i class="glyphicon glyphicon-file"></i> Artikel</a></li>
            <li><a href="index.php?hal=kontak"><i class="glyphicon glyphicon-phone-alt"></i> Kontak Kami</a></li>
            <li><a href="#"><i class="glyphicon glyphicon-lock"></i> Masuk</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

<?php 

switch ($hal) {
  case 'beranda':
    include 'beranda.php';
    break;
  case 'kategori':
    include 'kategori.php';
    break;
  case 'view':
    include 'view_artikel.php';
    break;
  case 'art':
    include 'artikel.php';
    break;
  case 'kontak':
    include 'kontak.php';
    break;
  case 'cari':
    include 'cari_artikel.php';
    break;
  
  default:
    include 'beranda.php';
    break;
}

 ?>

    <div class="col-md-12 footer alert-info" role="alert">
      <div class="col-md-1">&nbsp;</div>
      <div class="col-md-5">
        <ul type="none">
          <li><a href="#">Link 1</a></li>
          <li><a href="#">Link 2</a></li>
          <li><a href="#">Link 3</a></li>
        </ul>
      </div>
      <div class="col-md-5">
        <ul type="none">
          <li><a href="#">Link 1</a></li>
          <li><a href="#">Link 2</a></li>
          <li><a href="#">Link 3</a></li>
        </ul>
      </div>
    </div>
    <div class="footer1  col-md-12" role="alert" >Copyright &copy; inasaba <?php echo date('Y') ?></div>

  </div>
</body>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {

  var menu = $('.navbar-default');
  var origOffsetY = menu.offset().top;

  function scroll() {
    if ($(window).scrollTop() >= origOffsetY) {
      $('.navbar-default').addClass('navbar-fixed-top');
      $('.navbar-default').addClass('sticky');
    } else {
      $('.navbar-default').removeClass('navbar-fixed-top');
      $('.navbar-default').removeClass('sticky');
    }


  }

  document.onscroll = scroll;
  console.log('<?php echo $hal; ?>');
});
</script>
</html>
