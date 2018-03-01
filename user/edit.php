<?php $thisPage="Edit"; ?>
<?php $title = "Edit Profile | E-SDM BKD v1.0" ?>
<?php $description = "Edit Profile | E-SDM BKD v1.0" ?>
<?php 
include("header.php"); // memanggil file header.php
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>Edit Profile</h2>
			<hr />
			
			<?php
			$username = $_SESSION['user']; // assigment username dengan nilai username yang akan diedit
			$sql = mysqli_query($koneksi, "SELECT * FROM tbl_karyawan WHERE username='$username'"); // query untuk memilih entri data dengan nilai username terpilih
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){ // jika tombol 'Simpan' dengan properti name="save" ditekan
				$nip		     = $_POST['nip'];
				$nama		     = $_POST['nama'];
				$jenis_kelamin   = $_POST['jenis_kelamin'];
				$tempat_lahir	 = $_POST['tempat_lahir'];
				$tanggal_lahir	 = $_POST['tanggal_lahir'];
				$alamat 	     = $_POST['alamat'];
				$no_npwp		 = $_POST['no_npwp'];
				$no_askes		 = $_POST['no_askes'];
				$no_karpeg  	 = $_POST['no_karpeg'];
				$nik 			 = $_POST['nik'];
				$golruang	     = $_POST['golruang'];
				$eselon	     	 = $_POST['eselon'];
								
				$update = mysqli_query($koneksi, "UPDATE tbl_karyawan SET nama='$nama', jenis_kelamin='$jenis_kelamin', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', alamat='$alamat', no_npwp='$no_npwp', no_askes='$no_askes', no_karpeg='$no_karpeg', nik='$nik', golruang='$golruang', eselon='$eselon' WHERE username='$username'") or die(mysqli_error());  // query untuk mengupdate nilai entri dalam database
				if($update){ // jika query update berhasil dieksekusi
					header("Location: edit.php?username=".$username."&pesan=sukses"); // tambahkan pesan=sukses pada url
				}else{ // jika query update gagal dieksekusi
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>'; // maka tampilkan 'Data gagal disimpan, silahkan coba lagi.'
				}
			}
			
			if(isset($_GET['pesan']) == 'sukses'){ // jika terdapat pesan=sukses sebagai bagian dari berhasilnya query update dieksekusi
				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan. <- <a href="profile.php">Kembali ke Profile</a></div>'; // maka tampilkan 'Data berhasil disimpan.'
			}
			?>
			<!-- bagian ini merupakan bagian form untuk mengupdate data yang akan dimasukkan ke database -->
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">NIP</label>
					<div class="col-sm-2">
						<input type="text" name="nip" value="<?php echo $row ['nip']; ?>" class="form-control" placeholder="nip" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nama</label>
					<div class="col-sm-4">
						<input type="text" name="nama" value="<?php echo $row ['nama']; ?>" class="form-control" placeholder="Nama" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Jenis Kelamin</label>
					<div class="col-sm-2">
						<select name="jenis_kelamin" class="form-control" required>
							<option value="<?php echo $row ['jenis_kelamin']; ?>"><?php echo $row ['jenis_kelamin']; ?></option>
							<option value="Laki-Laki">Laki-Laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tempat Lahir</label>
					<div class="col-sm-4">
						<input type="text" name="tempat_lahir" value="<?php echo $row ['tempat_lahir']; ?>" class="form-control" placeholder="Tempat Lahir" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tanggal Lahir</label>
					<div class="col-sm-4">
						<input type="text" name="tanggal_lahir" value="<?php echo $row ['tanggal_lahir']; ?>" class="input-group datepicker form-control" date="" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Alamat</label>
					<div class="col-sm-3">
						<textarea name="alamat" class="form-control" placeholder="Alamat"><?php echo $row ['alamat']; ?></textarea>
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
						<input type="text" name="no_askes" value="<?php echo $row ['no_askes']; ?>" class="form-control" placeholder="NO ASKES" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">NO KARPEG</label>
					<div class="col-sm-3">
						<input type="no_karpeg" name="no_karpeg" value="<?php echo $row ['no_karpeg']; ?>" class="form-control" placeholder="NO KARPEG" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">NIK</label>
					<div class="col-sm-4">
						<input type="text" name="nik" value="<?php echo $row ['nik']; ?>" class="form-control" placeholder="NIK" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Golongan Ruang</label>
					<div class="col-sm-2">
						<select name="golruang" class="form-control" required>
							<option value="<?php echo $row['golruang']; ?>"> - Golongan Ruang Terbaru - </option>
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
                    <div class="col-sm-3">
                    <b>Golongan Ruang Sekarang :</b> <span class="label label-success"><?php echo $row['golruang']; ?></span>
				    </div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Eselon</label>
					<div class="col-sm-2">
						<select name="eselon" class="form-control" required>
							<option value="<?php echo $row['eselon']; ?>"> - Eselon Terbaru - </option>
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
                    <div class="col-sm-3">
                    <b>Eselon Sekarang :</b> <span class="label label-success"><?php echo $row['eselon']; ?></span>
				    </div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Simpan" data-toggle="tooltip" title="Simpan Data Karyawan">
						<a href="profile.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal">Batal</a>
					</div>
				</div>
			</form>
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>