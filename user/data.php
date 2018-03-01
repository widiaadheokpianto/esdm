<?php $thisPage="Data"; ?>
<?php $title = "Data | E-SDM BKD v1.0" ?>
<?php $description = "Data | E-SDM BKD v1.0" ?>
<?php 
include("header.php"); // memanggil file header.php
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>Data Karyawan</h2>
			<hr />

			<!-- bagian ini untuk memfilter data berdasarkan fakultas -->
			<form class="form-inline" method="get">
				<div class="form-group">
					<select name="filter" class="form-control" onchange="form.submit()">
						<option value="0">Filter Data Karyawan</option>
						<?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
						<option value="I.A" <?php if($filter == 'I.A'){ echo 'selected'; } ?>>I.A</option>
						<option value="I.B" <?php if($filter == 'I.B'){ echo 'selected'; } ?>>I.B</option>
						<option value="II.A" <?php if($filter == 'II.A'){ echo 'selected'; } ?>>II.A</option>
						<option value="II.B" <?php if($filter == 'II.B'){ echo 'selected'; } ?>>II.B</option>
						<option value="III.A" <?php if($filter == 'III.A'){ echo 'selected'; } ?>>III.A</option>
						<option value="III.B" <?php if($filter == 'III.B'){ echo 'selected'; } ?>>III.B</option>
						<option value="IV.A" <?php if($filter == 'IV.A'){ echo 'selected'; } ?>>IV.A</option>
						<option value="IV.B" <?php if($filter == 'IV.B'){ echo 'selected'; } ?>>IV.B</option>
						<option value="V.A" <?php if($filter == 'V.A'){ echo 'selected'; } ?>>V.A</option>
						<option value="V.B" <?php if($filter == 'V.B'){ echo 'selected'; } ?>>V.B</option>
						<option value="NON ESELON" <?php if($filter == 'NON ESELON'){ echo 'selected'; } ?>>NON ESELON</option>
					</select>
				</div>
			</form> <!-- end filter -->
			<br />
			<!-- memulai tabel responsive -->
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<tr>
						<th>No</th>
						<th>NIP</th>
						<th>Nama</th>
						<th>Jenis Kelamin</th>
						<th>Tempat Lahir</th>
						<th>Tanggal Lahir</th>
						<th>No Askes</th>
						<th>NIK</th>
						<th>Golongan Ruang</th>
						<th>Eselon</th>
					</tr>
					<?php
					if($filter){
						$sql = mysqli_query($koneksi, "SELECT * FROM tbl_karyawan WHERE eselon='$filter' ORDER BY nip ASC"); // query jika filter dipilih
					}else{
						$sql = mysqli_query($koneksi, "SELECT * FROM tbl_karyawan ORDER BY nip ASC"); // jika tidak ada filter maka tampilkan semua entri
					}
					if(mysqli_num_rows($sql) == 0){ 
						echo '<tr><td colspan="14">Data Tidak Ada.</td></tr>'; // jika tidak ada entri di database maka tampilkan 'Data Tidak Ada.'
					}else{ // jika terdapat entri maka tampilkan datanya
						$no = 1; // mewakili data dari nomor 1
						while($row = mysqli_fetch_assoc($sql)){ // fetch query yang sesuai ke dalam array
							echo '
							<tr>
								<td>'.$no.'</td>
								<td>'.$row['nip'].'</td>
								<td><a href="profile_karyawan.php?nip='.$row['nip'].'">'.$row['nama'].'</a></td>
								<td>'.$row['jenis_kelamin'].'</td>
								<td>'.$row['tempat_lahir'].'</td>
								<td>'.$row['tanggal_lahir'].'</td>
								<td>'.$row['no_askes'].'</td>
								<td>'.$row['nik'].'</td>
								<td>'.$row['golruang'].'</td>
								<td>';
								if($row['eselon'] == 'I.A')
								{
									echo '<span class="label label-success">I.A</span>';
								}
								else if ($row['eselon'] == 'I.B' )
								{
									echo '<span class="label label-success">I.B</span>';
								}
								else if ($row['eselon'] == 'II.A' )
								{
									echo '<span class="label label-success">II.A</span>';
								}
								else if ($row['eselon'] == 'III.A' )
								{
									echo '<span class="label label-success">III.A</span>';
								}
								else if ($row['eselon'] == 'III.B' )
								{
									echo '<span class="label label-success">III.B</span>';
								}
								else if ($row['eselon'] == 'IV.A' )
								{
									echo '<span class="label label-success">IV.A</span>';
								}
								else if ($row['eselon'] == 'IV.B' )
								{
									echo '<span class="label label-success">IV.B</span>';
								}
								else if ($row['eselon'] == 'V.A' )
								{
									echo '<span class="label label-success">V.A</span>';
								}
								else if ($row['eselon'] == 'V.B' )
								{
									echo '<span class="label label-success">V.B</span>';
								}
								else if ($row['eselon'] == 'NON ESELON' )
								{
									echo '<span class="label label-success">NON ESELON</span>';
								}
							echo '
								</td>
							</tr>
							';
							$no++; // mewakili data kedua dan seterusnya
						}
					}
					?>
				</table>
			</div> <!-- /.table-responsive -->
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>