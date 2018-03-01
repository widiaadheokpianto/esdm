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
			
			if(isset($_GET['aksi']) == 'delete'){ // jika tombol 'Hapus Data' pada baris 87 ditekan
				$delete = mysqli_query($koneksi, "DELETE FROM tbl_karyawan WHERE nip='$nip'"); // query delete entri dengan nip terpilih
				if($delete){ // jika query delete berhasil dieksekusi
					echo '<div class="alert alert-danger alert-dismissable">><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil dihapus.</div>'; // maka tampilkan 'Data berhasil dihapus.'
				}else{ // jika query delete gagal dieksekusi
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal dihapus.</div>'; // maka tampilkan 'Data gagal dihapus.'
				}
			}
			?>
			<!-- bagian ini digunakan untuk menampilkan data karyawan -->
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
			<a href="edit_karyawan.php?nip=<?php echo $row['nip']; ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit Data</a>
			<a href="profile_karyawan.php?aksi=delete&nip=<?php echo $row['nip']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin akan mengahapus data <?php echo $row['nama']; ?>')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus Data</a>
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>