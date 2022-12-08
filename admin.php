<?php
session_start();
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	include "./koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="web spp">
    <meta name="author" content="MuhammAd_Fariz">
	<link rel="shortcut icon" type="image/png" href="Assets\logo\invoice.png"/> 

    <title>WEB PEMBAYARAN SPP</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

	<style type="text/css">
	body {
	min-height: 200px;
	padding-top: 70px;
	background-color: #eee;
	background-image: url(Assets\logo\logo.jpg);
	}
   @media print {
      .noprint {
         display: none;
      }
   }
	</style>

</head>

  <body>

    <?php include "menu.php"; ?>

  <div class="container">
	
	<?php
	if( isset($_REQUEST['hlm'] )){
		
		$hlm = $_REQUEST['hlm'];
		
		switch( $hlm ){
			case 'bayar':
				include "./pembayaran.php";
				break;
			case 'laporan':
				include "./Laporan/laporan.php";
				break;
			case 'master':
				include "./master.php";
				break;
			case 'user':
				include "./profil.php";
				break;
		}
	} else {
	?>
      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h2 align="center">APLIKASI PEMBAYARAN SPP KEPONDOKAN</h2>
        <p align="center">Selamat Datang<strong> <?php echo $_SESSION['fullname']; ?></strong></p>
        <p align="center"><strong>PONDOK PESANTREN DURROTU ASWAJA</strong></p>
      </div>
	<?php
	}
	?>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript, Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(".force-logout").alert().delay(3000).slideUp('slow', function(){
			window.location = "./logout.php";
		});
      function fnCetak() {
         window.print();
      }
	</script>
  </body>

</html>
<?php
}
?>