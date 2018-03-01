<?php $thisPage="Cari"; ?>
<?php $title = "Data Tidak Ditemukan | E-SDM BKD v1.0" ?>
<?php $description = "Cari Data Karyawan | E-SDM BKD v1.0" ?>
<?php 
include("header.php"); // memanggil file header.php
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>Pencarian Data Karyawan</h2>
			<hr />
			
			<!-- bagian ini digunakan untuk menampilkan data karyawan hasil pencarian-->
			<table class="table table-striped table-condensed">
				<tr>
					<td>Data tidak ditemukan</td>
				</tr>
			</table>
			
			<a href="index.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Kembali ke Halaman Depan</a>
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>