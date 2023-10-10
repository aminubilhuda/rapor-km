<?php  
session_start();
if (empty($_SESSION['username']) or empty($_SESSION['password']) ) {
	?>
	<script type="text/javascript">
	alert('Anda Harus Login Terlebih Dahulu!');
	window.location.href="login.php";
	</script>
	<?php
}else{
	include "../config/koneksi.php";

	$lembaga = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM sekolah WHERE username='$_SESSION[username]' AND password='$_SESSION[password]'"));
?>
		<section class="content-header">
          <h1>
            Data Sekolah
            <small>it all starts here</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Data Sekolah</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        	<div class="row">
            <div class="col-md-6">
              <div class="box">
                <div class="box-header with-border bg-blue">
                  <h3 class="box-title">Data Induk Sekolah</h3>
                </div><!-- /.box-header -->
                <form method="POST">
                <div class="box-body">
                  <table class="table table-bordered" style="font-size: 11px;">
                  	<tr>
                  		<td>NPSN</td>
                  		<td><input type="text" name="npsn" class="form-control input-sm" required="" value="<?php echo $lembaga['npsn'] ?>"></td>
                  	</tr>
                  	<tr>
                  		<td>Nama Sekolah</td>
                  		<td><input type="text" name="nama_sekolah" class="form-control input-sm" required="" value="<?php echo $lembaga['nama_sekolah'] ?>"></td>
                  	</tr>
                  	<tr>
                  		<td>Alamat Sekolah</td>
                  		<td><input type="text" name="alamat" class="form-control input-sm" required="" placeholder="Isikan alamat sesuai dengan kop surat sekolah" value="<?php echo $lembaga['alamat'] ?>"></td>
                  	</tr>
                  	<tr>
                  		<td>Desa / Kelurahan</td>
                  		<td><input type="text" name="desa" class="form-control input-sm" required="" value="<?php echo $lembaga['desa'] ?>"></td>
                  	</tr>
                  	<tr>
                  		<td>Kabupaten</td>
                  		<td><input type="text" name="kabupaten" class="form-control input-sm" required="" value="<?php echo $lembaga['kabupaten'] ?>"></td>
                  	</tr>
                  	<tr>
                  		<td>Provinsi</td>
                  		<td><input type="text" name="provinsi" class="form-control input-sm" required="" value="<?php echo $lembaga['provinsi'] ?>"></td>
                  	</tr>
                  	<tr>
                  		<td>Email Sekolah</td>
                  		<td><input type="email" name="email" class="form-control input-sm" required="" value="<?php echo $lembaga['email'] ?>"></td>
                  	</tr>
                  	<tr>
                  		<td>Kontak Sekolah</td>
                  		<td><input type="text" name="no_telepon" class="form-control input-sm" required="" value="<?php echo $lembaga['no_telepon'] ?>"></td>
                  	</tr>
                  	<tr>
                  		<td>Website Sekolah</td>
                  		<td><input type="text" name="website" class="form-control input-sm" required="" value="<?php echo $lembaga['website'] ?>"></td>
                  	</tr>
                  	<tr>
                  		<td>Kepala Sekolah</td>
                  		<td><input type="text" name="kepala_sekolah" class="form-control input-sm" required="" value="<?php echo $lembaga['kepala_sekolah'] ?>"></td>
                  	</tr>
                  	<tr>
                  		<td>NIP. Kepala Sekolah</td>
                  		<td><input type="text" name="nip_kepala_sekolah" class="form-control input-sm" required="" value="<?php echo $lembaga['nip_kepala_sekolah'] ?>"></td>
                  	</tr>
                  	<tr>
                  		<td colspan="3" style="text-align: center;">
                  			<button type="submit" name="simpansekolahinduk" class="btn btn-primary btn-sm btn-block"><i class="fa fa-save"></i> Update Data</button>
                  		</td>
                  	</tr>
                    
                   </table>
               	</div>
               	</form>
               </div>
           </div>

           <?php  
           if (isset($_POST['simpansekolahinduk'])) {
           		$npsn = $_POST['npsn'];
           		$nama = $_POST['nama_sekolah'];
           		$alamat = $_POST['alamat'];
           		$desa = $_POST['desa'];
           		$kab = $_POST['kabupaten'];
           		$prop = $_POST['provinsi'];
           		$email = $_POST['email'];
           		$kontak = $_POST['no_telepon'];
           		$website = $_POST['website'];
           		$kepala = $_POST['kepala_sekolah'];
           		$nip = $_POST['nip_kepala_sekolah'];

           		$update = mysqli_query($mysqli,"UPDATE sekolah SET npsn='$npsn', nama_sekolah='$nama', alamat='$alamat', desa='$desa', kabupaten='$kab', provinsi='$prop', email='$email', no_telepon='$kontak', website='$website', kepala_sekolah='$kepala', nip_kepala_sekolah='$nip' WHERE kode_sekolah='$_GET[s]' ");
           		if ($update) {
           			?>
           			<script type="text/javascript">
           				alert('Berhasil memperbaharui Data Induk Sekolah');
           				window.location.href="?page=sekolah&s=<?php echo $_GET['s'] ?>";
           			</script>
           			<?php
           		}

           }
           ?>





           <div class="col-md-6">
           	<div class="row">
           		<div class="col-md-12">

           			<div class="box">
	                <div class="box-header with-border bg-orange">
	                  <h3 class="box-title">Data Penunjang Sekolah</h3>
	                </div><!-- /.box-header -->
	                <form method="POST">
	                <div class="box-body">
	                  <table class="table table-bordered" style="font-size: 11px;">
	                  	<tr>
	                  		<td>Jenjang</td>
	                  		<td>
	                  			<select name="jenjang" class="form-control input-sm" required="">
	                  				<option value="" required="">Pilih Jenjang Sekolah</option>
	                  				<?php  
	                  				$nomor = 1;
	                  				$jenjang = mysqli_query($mysqli,"SELECT * FROM jenjang ORDER BY id_jenjang ASC");
	                  				while ($rowjenjang = mysqli_fetch_array($jenjang)){if($lembaga['jenjang']==$rowjenjang['id_jenjang']){
	                  						$sele = "selected";
	                  					}else{
	                  						$sele = "";
	                  					}
	                  				?>
	                  				<option value="<?php echo $rowjenjang['id_jenjang'] ?>" <?php echo $sele ?>><?php echo $nomor++ ?>. <?php echo $rowjenjang['jenjang'] ?></option>
	                  				<?php } ?>
	                  			</select>
	                  		</td>
	                  	</tr>
	                  	<tr>
	                  		<td>Tahun Pelajaran Sekarang</td>
	                  		<td>
	                  			<select name="tahun" class="form-control input-sm" required="">
	                  				<option value="" required="">Pilih Tahun Pelajaran</option>
	                  				<?php  
	                  				$no = 1;
	                  				$tahun = mysqli_query($mysqli,"SELECT * FROM tahun_pelajaran ORDER BY id_tahun_pelajaran ASC");
	                  				while ($rowtahun = mysqli_fetch_array($tahun)){if($lembaga['tahun']==$rowtahun['id_tahun_pelajaran']){
	                  						$sele = "selected";
	                  					}else{
	                  						$sele = "";
	                  					}
	                  				?>
	                  				<option value="<?php echo $rowtahun['id_tahun_pelajaran'] ?>" <?php echo $sele ?>><?php echo $no++ ?>. <?php echo $rowtahun['tahun_pelajaran'] ?></option>
	                  				<?php } ?>
	                  			</select>
	                  		</td>
	                  	</tr>

	                  	<tr>
	                  		<td>Tahun Semester Sekarang</td>
	                  		<td>
	                  			<select name="semester" class="form-control input-sm" required="">
	                  				<option value="" required="">Pilih Semester</option>
	                  				<?php  
	                  				$noo = 1;
	                  				$semester = mysqli_query($mysqli,"SELECT * FROM semester ORDER BY id_semester ASC");
	                  				while ($rowsemester = mysqli_fetch_array($semester)){if($lembaga['semester']==$rowsemester['id_semester']){
	                  						$sele = "selected";
	                  					}else{
	                  						$sele = "";
	                  					}
	                  				?>
	                  				<option value="<?php echo $rowsemester['id_semester'] ?>" <?php echo $sele ?>><?php echo $noo++ ?>. <?php echo $rowsemester['semester'] ?></option>
	                  				<?php } ?>
	                  			</select>
	                  		</td>
	                  	</tr>

                      <tr>
                        <td>Aktifkan Sincronisasi Nilai ?</td>
                        <td>
                          <select name="sinc_lager" class="form-control input-sm" required="">
                            <option value="" required="">Pilih Aktifasi Sinc</option>
                            <option value="1" <?php if($lembaga['sinc_lager']=="1"){ echo "selected"; }?>>Ya</option>
                            <option value="0" <?php if($lembaga['sinc_lager']=="0"){ echo "selected"; }?>>Tidak</option>
                          </select>
                        </td>
                      </tr>
	                  	<tr>
	                  		<td colspan="3" style="text-align: center;">
	                  			<button type="submit" name="simpanpenunjang" class="btn btn-warning btn-sm btn-block"><i class="fa fa-save"></i> Update Data Penunjang</button>
	                  		</td>
	                  		
	                  	</tr>
	                    
	                   </table>
	               	</div>
	               	</form>
	               </div>
           		</div>

			  </div>

           </div>

           <?php  
           if (isset($_POST['simpanpenunjang'])) {
           		$jenjang = $_POST['jenjang'];
           		$tahun = $_POST['tahun'];
           		$semester = $_POST['semester'];

           		$update2 = mysqli_query($mysqli,"UPDATE sekolah SET jenjang='$jenjang', tahun='$tahun', semester='$semester', sinc_lager='$_POST[sinc_lager]' WHERE kode_sekolah='$_GET[s]'");

           		if ($update2) {
           			?>
           			<script type="text/javascript">
           				alert('Berhasil memperbaharui Data Penunjang Sekolah');
           				window.location.href="?page=sekolah&s=<?php echo $_GET['s'] ?>";
           			</script>
           			<?php
           		}
           }
           ?>


       	  </div>
        </section><!-- /.content -->


<?php } ?>