<?php  
session_start();
if (empty($_SESSION['kode_guru']) or empty($_SESSION['password']) or empty($_SESSION['tugas'])) {
	?>
	<script type="text/javascript">
	alert('Anda Harus Login Terlebih Dahulu!');
	window.location.href="login.php";
	</script>
	<?php
}else{

  	$siswa = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM siswa WHERE id_siswa='$_GET[i]'"));
?>

		<section class="content-header">
          <h1>
            <?php echo $siswa['nama_siswa'] ?>
            <small>it all starts here</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="?page=siswa-kelas&kode_sekolah=<?php echo $_GET[s] ?>"><i class="fa fa-users"></i> Siswa Kelas</a></li>
            <li class="active"><?php echo $siswa['nama_siswa'] ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        	<div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border bg-blue">
                  <h3 class="box-title">Biodata Siswa</h3>
                </div><!-- /.box-header -->
                <form method="POST">
                <div class="box-body">
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Peserta Didik</label>
                            <input type="text" name="nama_siswa" class="form-control input-sm" required="" value="<?php echo $siswa['nama_siswa'] ?>" onkeyup="this.value = this.value.toUpperCase()">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>NIS</label>
                            <input type="text" name="nis" class="form-control input-sm" required="" value="<?php echo $siswa['nis'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>NISN</label>
                            <input type="text" name="nisn" class="form-control input-sm" required="" value="<?php echo $siswa['nisn'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control input-sm" required="" value="<?php echo $siswa['tempat_lahir'] ?>" onkeyup="this.value = this.value.toUpperCase()">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control input-sm" required="" value="<?php echo $siswa['tanggal_lahir'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="kelamin" class="form-control input-sm" required="">
								<option value="" required="">Pilih Jenis Kelamin</option>
								<option value="LAKI-LAKI" <?php if($siswa['kelamin']=="LAKI-LAKI" or $siswa['kelamin']=="Laki-laki"){ echo "selected";} ?>>LAKI-LAKI</option>
								<option value="PEREMPUAN" <?php if($siswa['kelamin']=="PEREMPUAN" or $siswa['kelamin']=="Perempuan"){ echo "selected";} ?>>PEREMPUAN</option>
							</select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Agama</label>
                            <select name="agama" class="form-control input-sm" required="">
          								<option value="" required="">Pilih Jenis Agama</option>
          								<option value="ISLAM" <?php if($siswa['agama']=="ISLAM" or $siswa['agama']=="Islam"){ echo "selected";} ?>>ISLAM</option>
          								<option value="KATHOLIK" <?php if($siswa['agama']=="KATHOLIK" or $siswa['agama']=="Katholik"){ echo "selected";} ?>>KATHOLIK</option>
                          <option value="KRISTEN" <?php if($siswa['agama']=="KRISTEN" or $siswa['agama']=="Kristen"){ echo "selected";} ?>>KRISTEN</option>
                          <option value="HINDU" <?php if($siswa['agama']=="HINDU" or $siswa['agama']=="Hindu"){ echo "selected";} ?>>HINDU</option>
                          <option value="BUDHA" <?php if($siswa['agama']=="BUDHA" or $siswa['agama']=="Budha"){ echo "selected";} ?>>BUDHA</option>
                          <option value="KONG HU CHU" <?php if($siswa['agama']=="KONG HU CHU" or $siswa['agama']=="Kong Hu Chu"){ echo "selected";} ?>>KONG HU CHU</option>

							</select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Alamat Peserta Didik</label>
                            <input type="text" name="alamat_siswa" class="form-control input-sm" required="" value="<?php echo $siswa['alamat_siswa'] ?>" onkeyup="this.value = this.value.toUpperCase()" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kontak Peserta Didik</label>
                            <input type="text" name="kontak_siswa" class="form-control input-sm" required="" value="<?php echo $siswa['kontak_siswa'] ?>" onkeypress="return event.charCode >= 48 && event.charCode <=57" max="12">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Sekolah Asal</label>
                            <input type="text" name="sekolah_asal" class="form-control input-sm" required="" value="<?php echo $siswa['sekolah_asal'] ?>" onkeyup="this.value = this.value.toUpperCase()" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Diterima Di Sekolah ini Tanggal </label>
                            <input type="date" name="tanggal_terima" class="form-control input-sm" required="" value="<?php echo $siswa['tanggal_terima'] ?>" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Diterima Di Sekolah ini Pada Kelas </label>
                            <select name="terima_kelas" class="form-control input-sm" required="">
                                <option value="" required="">Pilih Kelas Saat Diterima Masuk</option>
                                <?php
                                $kelas = mysqli_query($mysqli,"SELECT * FROM kelas WHERE kode_sekolah='$sekolah[kode_sekolah]' ORDER BY id_tingkat ASC");
                                while($rowkelas = mysqli_fetch_array($kelas)){
                                    if($siswa['terima_kelas']==$rowkelas['id_kelas']){
                                        $sele = "selected";
                                    }else{
                                        $sele = "";
                                    }
                                ?>
                                <option value="<?php echo $rowkelas['id_kelas']?>" <?php echo $sele ?>><?php echo $rowkelas['nama_kelas']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Ayah</label>
                            <input type="text" name="nama_ayah" class="form-control input-sm" required="" value="<?php echo $siswa['nama_ayah'] ?>" onkeyup="this.value = this.value.toUpperCase()" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Ibu</label>
                            <input type="text" name="nama_ibu" class="form-control input-sm" required="" value="<?php echo $siswa['nama_ibu'] ?>" onkeyup="this.value = this.value.toUpperCase()" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pekerjaan Ayah</label>
                            <input type="text" name="pekerjaan_ayah" class="form-control input-sm" required="" value="<?php echo $siswa['pekerjaan_ayah'] ?>" onkeyup="this.value = this.value.toUpperCase()" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pekerjaan Ibu</label>
                            <input type="text" name="pekerjaan_ibu" class="form-control input-sm" required="" value="<?php echo $siswa['pekerjaan_ibu'] ?>" onkeyup="this.value = this.value.toUpperCase()" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Alamat Orang Tua</label>
                            <input type="text" name="alamat_orang_tua" class="form-control input-sm" required="" value="<?php echo $siswa['alamat_orang_tua'] ?>" onkeyup="this.value = this.value.toUpperCase()" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kontak Orang Tua</label>
                            <input type="text" name="kontak_ortu" class="form-control input-sm" required="" value="<?php echo $siswa['kontak_ortu'] ?>" onkeyup="this.value = this.value.toUpperCase()" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Hubungan Dalam Keluarga</label>
                            <select name="hubungan_dalam_keluarga" class="form-control input-sm" required="">
                                <option value="" required="">Pilih Status Hubungan Dalam Keluarga</option>
                                <option value="ANAK KANDUNG" <?php if($siswa['hubungan_dalam_keluarga']=="ANAK KANDUNG"){ echo "selected";}?>>ANAK KANDUNG</option>
                                <option value="ANAK TIRI" <?php if($siswa['hubungan_dalam_keluarga']=="ANAK TIRI"){ echo "selected";}?>>ANAK TIRI</option>
                                <option value="ANAK ANGKAT" <?php if($siswa['hubungan_dalam_keluarga']=="ANAK ANGKAT"){ echo "selected";}?>>ANAK ANGKAT</option>
                                <option value="ANAK PIARA" <?php if($siswa['hubungan_dalam_keluarga']=="ANAK PIARA"){ echo "selected";}?>>ANAK PIARA</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Jumlah Saudara</label>
                            <input type="number" name="jumlah_saudara" class="form-control input-sm" required="" value="<?php echo $siswa['jumlah_saudara'] ?>" onkeyup="this.value = this.value.toUpperCase()" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Anak Ke</label>
                            <input type="number" name="anak_ke" class="form-control input-sm" required="" value="<?php echo $siswa['anak_ke'] ?>" onkeyup="this.value = this.value.toUpperCase()" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Wali</label>
                            <input type="text" name="nama_wali" class="form-control input-sm" required="" value="<?php echo $siswa['nama_wali'] ?>" onkeyup="this.value = this.value.toUpperCase()" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pekerjaan Wali</label>
                            <input type="text" name="pekerjaan_wali" class="form-control input-sm" required="" value="<?php echo $siswa['pekerjaan_wali'] ?>" onkeyup="this.value = this.value.toUpperCase()" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Alamat Wali</label>
                            <input type="text" name="alamat_wali" class="form-control input-sm" required="" value="<?php echo $siswa['alamat_wali'] ?>" onkeyup="this.value = this.value.toUpperCase()" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kontak Wali</label>
                            <input type="text" name="kontak_wali" class="form-control input-sm" required="" value="<?php echo $siswa['kontak_wali'] ?>" onkeyup="this.value = this.value.toUpperCase()" >
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group text-center">
                            <button type="submit" name="simpandata" class="btn btn-primary btn-sm">Update Data</button>
							<a href="?page=siswa&s=<?php echo $_GET['s']?>" class="btn btn-danger btn-sm">Batalkan</a>
                        </div>
                    </div>
               	</div>
               	</form>
               </div>
           </div>
       	  </div>
       	  
       	  <?php
       	  if(isset($_POST['simpandata'])){
       	      $nama = $_POST['nama_siswa'];
       	      $nis = $_POST['nis'];
       	      $nisn = $_POST['nisn'];
       	      $kelamin = $_POST['kelamin'];
       	      $agama = $_POST['agama'];
       	      $tempatlahir = $_POST['tempat_lahir'];
       	      $tanggallahir = $_POST['tanggal_lahir'];
       	      $alamat_siswa = $_POST['alamat_siswa'];
       	      $kontak_siswa = $_POST['kontak_siswa'];
       	      $nama_ayah = $_POST['nama_ayah'];
       	      $nama_ibu = $_POST['nama_ibu'];
       	      $pekerjaan_ayah = $_POST['pekerjaan_ayah'];
       	      $pekerjaan_ibu = $_POST['pekerjaan_ibu'];
       	      $alamat_orang_tua = $_POST['alamat_orang_tua'];
       	      $kontak_ortu = $_POST['kontak_ortu'];
       	      $hubungan_dalam_keluarga = $_POST['hubungan_dalam_keluarga'];
       	      $jumlah_saudara = $_POST['jumlah_saudara'];
       	      $anak_ke = $_POST['anak_ke'];
       	      $nama_wali = $_POST['nama_wali'];
       	      $pekerjaan_wali = $_POST['pekerjaan_wali'];
       	      $alamat_wali = $_POST['alamat_wali'];
       	      $kontak_wali = $_POST['kontak_wali'];
       	      $sekolah_asal = $_POST['sekolah_asal'];
       	      $terima_kelas = $_POST['terima_kelas'];
       	      $terima_tanggal = $_POST['tanggal_terima'];
       	      
       	      $update = mysqli_query($mysqli,"UPDATE siswa SET nama_siswa='$nama', nis='$nis', nisn='$nisn', kelamin='$kelamin', agama='$agama', tempat_lahir='$tempatlahir', tanggal_lahir='$tanggallahir', alamat_siswa='$alamat_siswa', kontak_siswa='$kontak_siswa', nama_ayah='$nama_ayah', nama_ibu='$nama_ibu', pekerjaan_ayah='$pekerjaan_ayah', pekerjaan_ibu='$pekerjaan_ibu', alamat_orang_tua='$alamat_orang_tua', kontak_ortu='$kontak_ortu', hubungan_dalam_keluarga='$hubungan_dalam_keluarga', jumlah_saudara='$jumlah_saudara', anak_ke='$anak_ke', nama_wali='$nama_wali', pekerjaan_wali='$pekerjaan_wali', alamat_wali='$alamat_wali', kontak_wali='$kontak_wali', sekolah_asal='$sekolah_asal', tanggal_terima='$terima_tanggal', terima_kelas='$terima_kelas' WHERE id_siswa='$_GET[i]' AND kode_sekolah='$_GET[s]'");
       	      if($update){
       	          ?>
       	          <script>
       	              alert('Berhasil Memperbaharui Data');
       	              window.location.href="?page=detail_siswa&s=<?php echo $_GET['s']?>&i=<?php echo $_GET['i']?>";
       	          </script>
       	          <?php
       	      }else{
       	          ?>
       	          <script>
       	              alert('Gagal Memperbaharui Data');
       	              window.location.href="?page=detail_siswa&s=<?php echo $_GET['s']?>&i=<?php echo $_GET['i']?>";
       	          </script>
       	          <?php
       	      }
       	  }
       	  ?>
        

<?php } ?>