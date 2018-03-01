<?php $thisPage="Cari"; ?>
<?php $title = "Cari Data | E-SDM BKD v1.0" ?>
<?php $description = "Cari Data | E-SDM BKD v1.0" ?>
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
			$sql = mysqli_query($koneksi, "SELECT * FROM tbl_karyawan WHERE nip='$nip'"); // query untuk memilih entri dengan nip terpilih
			if(mysqli_num_rows($sql) == 0){
				header("Location: no_result.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			
			if(isset($_GET['aksi']) == 'delete'){ // jika tombol 'Hapus Data' ditekan
				$delete = mysqli_query($koneksi, "DELETE FROM tbl_karyawan WHERE nip='$nip'"); // query delete entri dengan nip terpilih
				if($delete){ // jika query delete berhasil dieksekusi
					echo '<div class="alert alert-danger alert-dismissable">><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil dihapus.</div>'; // maka tampilkan 'Data berhasil dihapus.'
				}else{ // jika query delete gagal dieksekusi
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal dihapus.</div>'; // maka tampilkan 'Data gagal dihapus.'
				}
			}
			?>
			<!-- bagian ini digunakan untuk menampilkan data karyawan hasil pencarian-->
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
			<a href="edit.php?nip=<?php echo $row['nip']; ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit Data</a>
			<a href="data.php?aksi=delete&nip=<?php echo $row['nip']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin akan mengahapus data <?php echo $row['nama']; ?>')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus Data</a>
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>