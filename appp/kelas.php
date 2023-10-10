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
        Kelas / Rombongan Belajar
        <small>it all starts here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-hode"></i> Home</a></li>
        <li class="active">Kelas / Rombongan Belajar</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border bg-blue">
                    <h3 class="box-title">Daftar Kelas</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <p>
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                            data-target="#myModal">Tambah Kelas</button>
                    </p>
                    <table class="table table-bordered" style="font-size: 11px;">
                        <tr style="background-color: orange;">
                            <td style="text-align: center; color: white;">No</td>
                            <td style="text-align: center; color: white;">Nama Kelas</td>
                            <td style="text-align: center; color: white;">Tingkat</td>
                            <td style="text-align: center; color: white;">Wali Kelas</td>
                            <td style="text-align: center; color: white;">Pembelajaran</td>
                            <td style="text-align: center; color: white;">Siswa Kelas</td>
                            <td style="text-align: center; color: white;">Aksi</td>
                        </tr>
                        <?php  
                    $nomor = 1;
                    $kelas = mysqli_query($mysqli,"SELECT * FROM kelas 
                    WHERE kode_sekolah='$_GET[s]'
                    ORDER BY id_kelas ASC");
                    while ($rowkelas = mysqli_fetch_array($kelas)) {
                    	$guru = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM guru WHERE id_guru='$rowkelas[id_guru]'"));
                    ?>
                        <tr>
                            <td style="text-align: center;"><?php echo $nomor++ ?></td>
                            <td style="text-align: left;">Kelas <?php echo $rowkelas['nama_kelas'] ?></td>
                            <td style="text-align: center;">Tingkat <?php echo $rowkelas['id_tingkat'] ?></td>
                            <td style="text-align: center;">
                                <?php if ($rowkelas['id_guru']==0) { ?>
                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal"
                                    data-target="#myModal<?php echo $rowkelas['id_kelas']?>">Pilih Guru</button>
                                <?php }else{ ?>
                                <button type="button" class="btn btn-primary btn-xs" data-toggle="modal"
                                    data-target="#myModal<?php echo $rowkelas['id_kelas']?>"><?php echo $guru['nama_guru'] ?></button>
                                <?php } ?>
                            </td>
                            <div class="modal fade" id="myModal<?php echo $rowkelas['id_kelas']?>" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header bg-green">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Form Pilih Wali Kelas</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST">
                                                <input type="hidden" name="id_kelas"
                                                    value="<?php echo $rowkelas[id_kelas] ?>">
                                                <div class="form-group">
                                                    <label>Daftar Guru</label>
                                                    <select name="id_guru" class="form-control input-sm" required="">
                                                        <option value="" required="">Pilih Guru</option>
                                                        <?php  
			                          	$dataguru = mysqli_query($mysqli,"SELECT * FROM guru 
			                          	WHERE kode_sekolah = '$rowkelas[kode_sekolah]' AND penugasan='1' ORDER BY id_guru ASC");
			                          	while ($rowguru = mysqli_fetch_array($dataguru)) {
			                          		if ($rowkelas['id_guru']==$rowguru['id_guru']) {
			                          			$sele = "selected";
			                          		}else{
			                          			$sele = "";
			                          		}
			                          	?>
                                                        <option value="<?php echo $rowguru[id_guru] ?>"
                                                            <?php echo $sele ?>><?php echo $rowguru['nama_guru'] ?>
                                                        </option>
                                                        <?php } ?>

                                                    </select>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="submit" name="simpandataguru"
                                                        class="btn btn-success">Update</button>
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Close</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <td style="text-align: center;">
                                <a href="?page=pembelajaran&s=<?php echo $_GET[s] ?>&kl=<?php echo $rowkelas[id_kelas] ?>"
                                    class="btn btn-success btn-xs"> Pembelajaran Kelas</a>
                            </td>
                            <td style="text-align: center;">
                                <a href="?page=siswa-kelas&s=<?php echo $_GET[s] ?>&kl=<?php echo $rowkelas[id_kelas] ?>"
                                    class="btn btn-danger btn-xs">
                                    <?php  
                        echo 
                        $jumlahsiswakelas = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM siswa_kelas WHERE id_kelas='$rowkelas[id_kelas]'"));
                        ;
                        ?>
                                    Siswa</a>
                            </td>
                            <td style="text-align: center;">
                                <a href="" class="btn btn-danger btn-xs" data-toggle="modal"
                                    data-target="#myModalhapuskelas<?php echo $rowkelas['id_kelas']?>"><i
                                        class="fa fa-trash"></i></a>
                            </td>

                            <div class="modal fade" id="myModalhapuskelas<?php echo $rowkelas['id_kelas']?>"
                                role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header bg-red">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Konfirmasi Hapus Kelas</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST">
                                                <input type="hidden" name="id_kelas"
                                                    value="<?php echo $rowkelas[id_kelas] ?>">

                                                <h1 style="text-align: center;">Yakin akan menghapus kelas ini?</h1>

                                                <div class="modal-footer">
                                                    <button type="submit" name="kirimhapuskelas"
                                                        class="btn btn-success">Update</button>
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Close</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section><!-- /.content -->

<?php  
        if (isset($_POST['kirimhapuskelas'])) {
            $idkelas = $_POST['id_kelas'];

            $hapuskelas = mysqli_query($mysqli,"DELETE FROM kelas WHERE id_kelas='$idkelas'");
            $hapusmapelkelas = mysqli_query($mysqli,"DELETE FROM mapel_kelas WHERE id_kelas='$idkelas'");
            $hapusmapelnilaiakhir= mysqli_query($mysqli,"DELETE FROM nilai_akhir WHERE id_kelas='$idkelas'");

            $ambildatasisw = mysqli_query($mysqli,"SELECT * FROM siswa_kelas WHERE id_kelas='$idkelas'");
            $jumlahdata = mysqli_num_rows($ambildatasisw);
            while ($rowambildata = mysqli_fetch_array($ambildatasisw)) {
              $idsiswa[] = $rowambildata['id_siswa'];
            }
            for ($i=0; $i <$jumlahdata ; $i++) { 
                
                $updatesiswa = mysqli_query($mysqli,"UPDATE siswa SET aktif='0' WHERE id_siswa='$idsiswa[$i]'");
            }
            $hapussiswakelas = mysqli_query($mysqli,"DELETE FROM siswa_kelas WHERE id_kelas='$idkelas'");


            if($hapussiswakelas){
              ?><script type="text/javascript">
alert('Berhasil');
window.location.href = "?page=kelas&s=<?php echo $_GET['s'] ?>";
</script><?php
            }

        }
        ?>




<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header bg-green">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Form Tambah Kompetensi Dasar</h4>
            </div>
            <div class="modal-body">
                <form method="POST">

                    <div class="form-group">
                        <label>Tingkat</label>
                        <select name="id_tingkat" class="form-control input-sm" required="">
                            <option value="" required="">Pilih Tingkat</option>
                            <?php
                            $tingkat = mysqli_query($mysqli,"SELECT * FROM tingkat
                            WHERE id_jenjang = $lembaga[jenjang]
                            ORDER BY id_tingkat ASC");
                            while($rowtingkat = mysqli_fetch_array($tingkat)){
                                $jenjang = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM jenjang WHERE id_jenjang='$rowtingkat[id_jenjang]'"))
                            ?>
                            <option value="<?php echo $rowtingkat['id_tingkat']?>"><?php echo $rowtingkat['tingkat']?> -
                                <?php echo $jenjang['jenjang']?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Kelas</label>
                        <input type="text" name="nama_kelas" class="form-control input-sm" required=""
                            autocomplete="off" placeholder="Cth : 1 atau 1A">
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
            	$tingkat = $_POST['id_tingkat'];
            	$nama = $_POST['nama_kelas'];
                
                $datatingkat = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM tingkat WHERE id_tingkat='$tingkat'"));
                $fase = $datatingkat['id_fase'];
                
            	$query = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM kelas WHERE id_tingkat='$tingkat' AND nama_kelas='$nama' AND kode_sekolah='$_GET[s]'"));

            	if ($query > 0) {
            		?>
<script type="text/javascript">
alert('Kelas ini sudah ada!');
window.location.href = "?page=kelas&s=<?php echo $_GET['s'] ?>";
</script>
<?php
            	}else{
                
            		$insert = mysqli_query($mysqli,"INSERT INTO kelas (kode_sekolah, tahun, semester, id_tingkat, id_fase, nama_kelas)VALUES('$_GET[s]', '$lembaga[tahun]', '$lembaga[semester]', '$tingkat', '$fase', '$nama')");
            		if ($insert) {
            			?>
<script type="text/javascript">
alert('Kelas <?php echo $nama ?> Berhasil ditambahkan');
window.location.href = "?page=kelas&s=<?php echo $_GET['s'] ?>";
</script>
<?php
            		}else{
            			?>
<script type="text/javascript">
alert('Kelas <?php echo $nama ?> Gagal ditambahkan');
window.location.href = "?page=kelas&s=<?php echo $_GET['s'] ?>";
</script>
<?php
            		}
            	}
            }
            ?>

<?php  
            if (isset($_POST['simpandataguru'])) {
            	$guru = $_POST['id_guru'];
            	$kelas = $_POST['id_kelas'];
            	
            	$datakelas = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM kelas WHERE id_kelas='$kelas'"));
            	
            		$insert = mysqli_query($mysqli,"UPDATE kelas SET id_guru='$guru' WHERE id_kelas='$kelas' AND kode_sekolah='$_GET[s]'");
            		if ($insert) {
            			?>
<script type="text/javascript">
alert('Guru Kelas, Kelas <?php echo $datakelas['nama_kelas'] ?> Berhasil ditambahkan');
window.location.href = "?page=kelas&s=<?php echo $_GET['s'] ?>";
</script>
<?php
            		}else{
            			?>
<script type="text/javascript">
alert('Guru Kelas, Kelas <?php echo $kelas ?> Gagal ditambahkan');
window.location.href = "?page=kelas&s=<?php echo $_GET['s'] ?>";
</script>
<?php
            		}
            	
            }
            ?>

<?php } ?>