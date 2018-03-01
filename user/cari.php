<?php $thisPage="Cari"; ?>
<?php $title = "Cari Data Karyawan | E-SDM BKD v1.0" ?>
<?php $description = "Cari Data Karyawan | E-SDM BKD v1.0" ?>
<?php 
include("header.php"); // memanggil file header.php
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<?php $nip = $_POST['carinip']; // mengambil nip dari form cari ?> 
			<h2>Pencarian Data Karyawan &raquo; NIP: <?php echo $nip; // menampilkan nip ?></h2>
			<hr />
			
			<?php
			$sql = mysqli_query($koneksi, "SELECT * FROM tbl_mahasiswa WHERE nip='$nip'"); // query untuk memilih entri dengan nip terpilih
			if(mysqli_num_rows($sql) == 0){
				header("Location: no_result.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			?>
			<!-- bagian ini digunakan untuk menampilkan data mahasiswa hasil pencarian-->
		<table class="table table-striped table-condensed">
				<tr>
					<th width="20%">NIP</th>
					<td><?php echo $row['nip']; ?></td>
				</tr>
				<tr>
					<th>Nama Karyawan</th>
					<td><?php echo $row['nama']; ?></td>
				</tr>
				<tr>
					<th>Jenis Kelamin</th>
					<td><?php echo $row['jenis_kelamin']; ?></td>
				</tr>
				<tr>
					<th>Tempat & Tanggal Lahir</th>
					<td><?php echo $row['tempat_lahir'].', '.$row['tanggal_lahir']; ?></td>
				</tr>
				<tr>
					<th>Alamat</th>
					<td><?php echo $row['alamat']; ?></td>
				</tr>
				<tr>
					<th>NO NPWP</th>
					<td><?php echo $row['no_npwp']; ?></td>
				</tr>
				<tr>
					<th>NO ASKES</th>
					<td><?php echo $row['no_askes']; ?></td>
				</tr>
				<tr>
					<th>NO KARPEG</th>
					<td><?php echo $row['no_karpeg']; ?></td>
				</tr>
				<tr>
					<th>NIK</th>
					<td><?php echo $row['nik']; ?></td>
				</tr>
				<tr>
					<th>Golongan Ruang</th>
					<td><?php echo $row['golruang']; ?></td>
				</tr>
				<tr>
					<th>Eselon</th>
					<td><?php echo $row['eselon']; ?></td>
				</tr>
				<tr>
					<th>Username</th>
					<td><?php echo $row['username']; ?></td>
				</tr>
			</table>
			
			<a href="data.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Kembali</a>
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>