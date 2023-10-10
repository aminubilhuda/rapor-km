<?php  
session_start();
if (empty($_SESSION['username']) or empty($_SESSION['password']) ) {
	?>
<script type="text/javascript">
alert('Anda Harus Login Terlebih Dahulu!');
window.location.href = "login.php";
</script>
<?php
}else{
	include "../config/koneksi.php";

	$lembaga = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM sekolah WHERE username='$_SESSION[username]' AND password='$_SESSION[password]'"));
?>
<section class="content-header">
    <h1>
        Siswa Mutasi Keluar
        <small>it all starts here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Mutasi Keluar</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border bg-blue">
                    <h3 class="box-title">Daftar Siswa Mutasi Keluar</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <p>
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                            data-target="#myModal">Tambah Mutasi</button>
                    </p>
                    <table class="table table-bordered" style="font-size: 11px;">
                        <tr style="background-color: orange;">
                            <td style="text-align: center; color: white;">No</td>
                            <td style="text-align: center; color: white;">Nama Siswa</td>
                            <td style="text-align: center; color: white;">NIS / NISN</td>
                            <td style="text-align: center; color: white;">Alasan Mutasi</td>
                            <td style="text-align: center; color: white;">Sekolah Tujuan</td>
                            <td style="text-align: center; color: white;">Tanggal Mutasi</td>
                            <td style="text-align: center; color: white;">Aksi</td>
                        </tr>
                        <?php  
                    $nomor = 1;
                    $guru = mysqli_query($mysqli,"SELECT * FROM siswa_keluar 
                    WHERE kode_sekolah='$_GET[s]'
                    ORDER BY tanggal ASC");
                    while ($rowguru = mysqli_fetch_array($guru)) {
                    	$siswa = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM siswa WHERE id_siswa='$rowguru[id_siswa]'"));
                    	
                    ?>
                        <tr>
                            <td style="text-align: center;"><?php echo $nomor++ ?></td>
                            <td style="text-align: left;"><?php echo $siswa['nama_siswa'] ?></td>
                            <td style="text-align: center;"><?php echo $siswa['nis'] ?> / <?php echo $siswa['nisn'] ?>
                            </td>
                            <td style="text-align: center;"><?php echo $rowguru['alasan'] ?></td>
                            <td style="text-align: center;"><?php echo $rowguru['sekolah_tujuan'] ?></td>
                            <td style="text-align: center;"><?php echo tgl_indonesia($rowguru['tanggal']) ?></td>
                            <td style="text-align: center;">
                                <a href="../assets/app/doc/administrasi_mutasi.php?s=<?php echo $_GET[s] ?>&i=<?php echo $rowguru[id_siswa] ?>"
                                    target="_blank" class="btn btn-primary btn-xs"> Cetak Data</a>
                            </td>

                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section><!-- /.content -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header bg-green">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Form Tambah Mutasi</h4>
            </div>
            <div class="modal-body">
                <form method="POST">

                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <input type="text" name="nama_siswa" class="form-control input-sm" required=""
                            autocomplete="off" placeholder="Isikan Nama Siswa yang sesuai">
                    </div>

                    <div class="form-group">
                        <label>Alasan</label>
                        <select name="alasan" class="form-control input-sm" required="">
                            <option value="" required="">Pilih Alasan</option>
                            <option value="Kemauan Orang Tua">Kemauan Orang Tua</option>
                            <option value="Kemauan Sendiri">Kemauan Sendiri</option>
                            <option value="Kesalahan Data">Kesalahan Data</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Sekolah Tujuan</label>
                        <input type="text" name="sekolah_tujuan" class="form-control input-sm" required=""
                            autocomplete="off" placeholder="Isikan Nama Sekolah Tujuan">
                    </div>

                    <div class="modal-footer">
                        <button type="submit" name="simpandata" class="btn btn-success">Update</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<?php  
            if (isset($_POST['simpandata'])) {
            	$nama = $_POST['nama_siswa'];
            	$alasan = $_POST['alasan'];
            	$sekolah = $_POST['sekolah_tujuan'];
            	$tanggal = date('Y-m-d');
            	
            	$datasiswa = mysqli_query($mysqli,"SELECT * FROM siswa WHERE nama_siswa='$nama'");
            	if(mysqli_num_rows($datasiswa) > 0){
            		$rowdatamutasi = mysqli_fetch_array($datasiswa);

            		$kelas = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM siswa_kelas WHERE id_siswa='$rowdatamutasi[id_siswa]' AND tahun='$lembaga[tahun]' AND semester='$lembaga[semester]'"));

            		$simpan1 = mysqli_query($mysqli,"INSERT INTO siswa_keluar (kode_sekolah, tahun, semester, id_siswa, id_kelas, alasan, tanggal, sekolah_tujuan)VALUES('$_GET[s]', '$lembaga[tahun]', '$lembaga[semester]', '$rowdatamutasi[id_siswa]', '$kelas[id_kelas]', '$alasan', '$tanggal', '$sekolah')");

            		if ($simpan1) {
                  
            			$hapussiswakelas = mysqli_query($mysqli,"DELETE FROM siswa_kelas WHERE id_siswa_kelas='$kelas[id_siswa_kelas]'");

            			$updatesiswa = mysqli_query($mysqli,"UPDATE siswa SET aktif='3' WHERE id_siswa='$rowdatamutasi[id_siswa]'");

            			?>
<script type="text/javascript">
alert('Berhasil');
window.location.href = "?page=mutasi-keluar&s=<?php echo $_GET['s'] ?>"
</script>
<?php
            		}
            	}else{
            		?>
<script type="text/javascript">
alert('Nama yang anda masukkan tidak sesuai');
</script>
<?php
            	}
            }
            ?>




<?php } ?>