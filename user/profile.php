<?php $thisPage="Profile"; ?>
<?php $title = "Profile | E-SDM BKD v1.0" ?>
<?php $description = "Halaman Profile" ?>
<?php 
include("header.php"); // memanggil file header.php
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>Profile</h2>
			<hr />
			
			<?php
			$username = $_SESSION['user']; // mengambil username dari session yang login
			
			$sql = mysqli_query($koneksi, "SELECT * FROM tbl_karyawan WHERE username='$username'"); // query memilih entri username pada database
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			?>
			<!-- bagian ini digunakan untuk menampilkan data profile -->
			<table class="table table-striped table-condensed">
				<tr>
					<th>Username</th>
					<td><?php echo $row['username']; ?></td>
				</tr>
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
			</table>
			
			<a href="index.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Dashboard</a>
			<a href="edit.php?username=<?php echo $row['username']; ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit Profile</a>
			<a href="password.php?username=<?php echo $row['username']; ?>" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Ganti Password</a>
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>