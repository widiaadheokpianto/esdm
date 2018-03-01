<?php $thisPage="Dashboard"; ?>
<?php $title = "Dashboard User | E-SDM BKD v1.0" ?>
<?php $description = "Dashboard User | E-SDM BKD v1.0" ?>
<?php 
include("header.php"); // memanggil file header.php
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<!-- Start container -->
	<div class="container">
		<div class="content">
			<div class="jumbotron">
				<img src="../img/Logo.png" height="200px" align="left" >
				<center>
					<h1>E-SDM</h1>
					<h2>Badan Kepegawaian Daerah Kota Semarang.</h2>
					<a href="data.php" data-toggle="tooltip" title="Lihat Data Karyawan" class="btn btn-info" role="button"><span class="glyphicon glyphicon-list"></span> Lihat Data Karyawan</a>
				</center>
				
			</div> <!-- /.jumbotron -->
		</div> <!-- /.content -->
	</div>
	<!-- End container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>