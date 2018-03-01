<?php $thisPage="Profile"; ?>
<?php $title = "Profile Karyawan | E-SDM BKD v1.0" ?>
<?php $description = "Halaman Profile Karyawan" ?>
<?php 
include("header.php"); // memanggil file header.php
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>Data Karyawan &raquo; Biodata</h2>
			<hr />
			
			<?php
			$nip = $_GET['nip']; // mengambil data nip dari nip yang terpilih
			
			$sql = mysqli_query($koneksi, "SELECT * FROM tbl_karyawan WHERE nip='$nip'"); // query memilih entri nip pada database
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			?>
			<!-- bagian ini digunakan untuk menampilkan data mahasiswa -->
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