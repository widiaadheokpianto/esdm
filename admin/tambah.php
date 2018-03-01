<?php $thisPage="Tambah"; ?>
<?php $title = "Tambah Data Karyawan | E-SDM BKD v1.0" ?>
<?php $description = "Tambah Data Karyawan | E-SDM BKD v1.0" ?>
<?php 
include("header.php"); // memanggil file header.php
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>Data Karyawan &raquo; Tambah Data</h2>
			<hr />
			
			<?php
			if(isset($_POST['add'])){ // jika tombol 'Simpan' dengan properti name="add" ditekan
				$nip		     = $_POST['nip'];
				$nama		     = $_POST['nama'];
				$jenis_kelamin   = $_POST['jenis_kelamin'];
				$tempat_lahir	 = $_POST['tempat_lahir'];
				$tanggal_lahir	 = $_POST['tanggal_lahir'];
				$alamat          = $_POST['alamat'];
				$no_npwp 		 = $_POST['no_npwp'];
				$no_askes		 = $_POST['no_askes'];
				$no_karpeg  	 = $_POST['no_karpeg'];
				$nik 			 = $_POST['nik'];
				$golruang   	 = $_POST['golruang'];
				$eselon 	     = $_POST['eselon'];
				$username		 = $_POST['username'];
				$level			 = $_POST['level'];
				$pass1	         = $_POST['pass1'];
				$pass2           = $_POST['pass2'];
				
				$cek = mysqli_query($koneksi, "SELECT * FROM tbl_karyawan WHERE nip='$nip'"); // query untuk memilih entri dengan nip terpilih
				if(mysqli_num_rows($cek) == 0){ // mengecek apakah nip yang akan ditambahkan tidak ada dalam database
					if($pass1 == $pass2){ // mengecek apakah nilai pada pass1 dan pass2 bernilai sama
						$pass = md5($pass1); // assigment variabel pass dengan nilai pass1 yang sudah dienkripsi dengan md5
						$insert = mysqli_query($koneksi, "INSERT INTO tbl_karyawan(nip, nama, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, no_npwp, no_askes, no_karpeg, nik, golruang, eselon, username, level, password) VALUES('$nip','$nama', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$no_npwp', '$no_askes', '$no_karpeg', '$nik', '$golruang', '$eselon', '$username', '$level', '$pass')") or die(mysqli_error()); // query untuk menambahkan data ke dalam database
						if($insert){ // jika query insert berhasil dieksekusi
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Karyawan Berhasil Di Simpan. <a href="data.php"><- Kembali</a></div>'; // maka tampilkan 'Data Karyawan Berhasil Di Simpan.'
						}else{ // jika query insert gagal dieksekusi
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Karyawan Gagal Di simpan! <a href="data.php"><- Kembali</a></div>'; // maka tampilkan 'Ups, Data Karyawan Gagal Di simpan!'
						}
					} else{ // mengecek jika password yang diinput tidak sama
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password Tidak sama!</div>'; // maka tampilkan 'Password Tidak sama!'
					}
				}else{ // mengecek jika nip yang akan ditambahkan sudah ada dalam database
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>NIP Sudah Ada..! <a href="data.php"><- Kembali</a></div>'; // maka tampilkan 'nip Sudah Ada..!'
				}
			}
			?>
			<!-- bagian ini merupakan bagian form untuk menginput data yang akan dimasukkan ke database -->
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">NIP</label>
					<div class="col-sm-2">
						<input type="text" name="nip" class="form-control" placeholder="NIP" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nama</label>
					<div class="col-sm-4">
						<input type="text" name="nama" class="form-control" placeholder="Nama" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Jenis Kelamin</label>
					<div class="col-sm-2">
						<select name="jenis_kelamin" class="form-control" required>
							<option value=""> - Pilih - </option>
							<option value="Laki-Laki">Laki-Laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tempat Lahir</label>
					<div class="col-sm-4">
						<input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tanggal Lahir</label>
					<div class="col-sm-3">
						<input type="text" name="tanggal_lahir" class="input-group datepicker form-control" date="" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Alamat</label>
					<div class="col-sm-3">
						<textarea name="alamat" class="form-control" placeholder="Alamat"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">NO NPWP</label>
					<div class="col-sm-3">
						<input type="text" name="no_npwp" class="form-control" placeholder="NO NPWP" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">NO ASKES</label>
					<div class="col-sm-3">
						<input type="text" name="no_askes" class="form-control" placeholder="NO ASKES" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">NO KARPEG</label>
					<div class="col-sm-3">
						<input type="text" name="no_karpeg" class="form-control" placeholder="NO KARPEG" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">NIK</label>
					<div class="col-sm-4">
						<input type="text" name="nik" class="form-control" placeholder="NIK" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Golongan Ruang</label>
					<div class="col-sm-2">
						<select name="golruang" class="form-control" required>
							<option value=""> - Pilih Golongan Ruang - </option>
							<option value="I/A : JURU MUDA">I/A : JURU MUDA</option>
							<option value="I/B : JURU MUDA TINGKAT I">I/B : JURU MUDA TINGKAT I</option>
							<option value="I/C : JURU">I/C : JURU</option>
							<option value="I/D : JURU TINGKAT I">I/D : JURU TINGKAT I</option>
                            <option value="II/A : PENGATUR MUDA">II/A : PENGATUR MUDA</option>
							<option value="II/B : PENGATUR MUDA TINGKAT I">II/B : PENGATUR MUDA TINGKAT I</option>
							<option value="II/C : PENGATUR">II/C : PENGATUR</option>
							<option value="II/D : PENGATUR TINGKAT I">II/D : PENGATUR TINGKAT I</option>
							<option value="III/A : PENATA MUDA">III/A : PENATA MUDA</option>							
							<option value="III/B : PENATA MUDA TINGKAT I">III/B : PENATA MUDA TINGKAT I</option>
							<option value="III/C : PENATA">III/C : PENATA</option>
							<option value="III/D : PENATA TINGKAT I">III/D : PENATA TINGKAT I</option>
							<option value="IV/A : PEMBINA">IV/A : PEMBINA</option>
							<option value="IV/B : PEMBINA TINGKAT I">IV/B : PEMBINA TINGKAT I</option>
							<option value="IV/C : PEMBINA UTAMA MUDA">IV/C : PEMBINA UTAMA MUDA</option>							
							<option value="IV/D : PEMBINA UTAMA MADYA">IV/D : PEMBINA UTAMA MADYA</option>
							<option value="IV/E : PEMBINA UTAMA">IV/E : PEMBINA UTAMA</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Eselon</label>
					<div class="col-sm-2">
						<select name="eselon" class="form-control" required>
							<option value=""> - Pilih Eselon - </option>
							<option value="I.A">I.A</option>
							<option value="I.B" >I.B</option>
							<option value="II.A">II.A</option>
							<option value="II.B">II.B</option>
							<option value="III.A">III.A</option>
							<option value="III.B">III.B</option>
							<option value="IV.A" >IV.A</option>
							<option value="IV.B">IV.B</option>
							<option value="V.A" >V.A</option>
							<option value="V.B">V.B</option>
							<option value="NON ESELON">NON ESELON</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Username</label>
					<div class="col-sm-2">
						<input type="text" name="username" class="form-control" placeholder="Username" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Level</label>
					<div class="col-sm-2">
						<select name="level" class="form-control" required>
							<option value=""> - Pilih - </option>
							<option value="admin">Admin</option>
							<option value="user">User</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Password</label>
					<div class="col-sm-2">
						<input type="password" name="pass1" class="form-control" placeholder="Password" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Ulangi Password</label>
					<div class="col-sm-2">
						<input type="password" name="pass2" class="form-control" placeholder="Ulangi Password" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Simpan" data-toggle="tooltip" title="Simpan Data Karyawan">
						<a href="index.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal">Batal</a>
					</div>
				</div>
			</form> <!-- /form -->
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>