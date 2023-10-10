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
  
	$kelas = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM kelas WHERE id_kelas='$_GET[kl]'"));
?>


<section class="content-header">
    <h1>
        Siswa Kelas <?php echo $kelas['nama_kelas'] ?>
        <small>it all starts here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="?page=kelas&s=<?php echo $_GET[s] ?>"><i class="fa fa-university"></i> Kelas</a></li>
        <li class="active">Siswa Kelas</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <form method="POST">
                <div class="box">
                    <div class="box-header with-border bg-blue">
                        <h3 class="box-title">Daftar Siswa Non Kelas</h3>
                        <div class="box-tools">
                            <button type="submit" name="mapingkelas" class="btn btn-success btn-sm">Mapping
                                Kelas</button>
                        </div>
                    </div><!-- /.box-header -->

                    <div id='tablereset' class="box-body">
                        <table id="example1" class="table table-bordered" style="font-size: 10px;"
                            data-page-length="100">
                            <thead>
                                <tr style="background-color: orange;">
                                    <th style="text-align: center; color: white;">No</th>
                                    <th style="text-align: center; color: white;"><input type='checkbox' id='ceksemua'>
                                    </th>
                                    <th style="text-align: center; color: white;">Nama Siswa</th>
                                    <th style="text-align: center; color: white;">Kelas</th>
                                    <th style="text-align: center; color: white;">NIS</th>
                                    <th style="text-align: center; color: white;">Kelamin</th>
                                    <th style="text-align: center; color: white;">Agama</th>
                                </tr>
                            </thead>
                            <?php  
                                $nomor = 1;
                                $siswa = mysqli_query($mysqli,"SELECT * FROM siswa 
                                WHERE kode_sekolah='$_GET[s]' AND aktif='0'
                                ORDER BY nama_siswa ASC");
                                while ($rowsiswa = mysqli_fetch_array($siswa)) {
                            ?>
                            <tr>
                                <td style="text-align: center;"><?php echo $nomor++ ?></td>
                                <td style="text-align: center;">
                                    <input type="checkbox" name="siswa[]" value="<?php echo $rowsiswa[id_siswa] ?>">
                                </td>
                                <td style="text-align: left;"><?php echo $rowsiswa['nama_siswa'] ?></td>
                                <td style="text-align: left;"><?php echo $rowsiswa['terima_kelas'] ?></td>
                                <td style="text-align: center;"><?php echo $rowsiswa['nis'] ?></td>
                                <td style="text-align: center;"><?php echo $rowsiswa['kelamin'] ?></td>
                                <td style="text-align: center;"><?php echo $rowsiswa['agama'] ?></td>

                            </tr>
                            <?php } ?>
                        </table>
                    </div>
            </form>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box">
            <div class="box-header with-border bg-blue">
                <h3 class="box-title">Daftar Siswa Kelas <?php echo $kelas['nama_kelas'] ?></h3>
            </div><!-- /.box-header -->
            <form method="POST">


                <div class="box-body">
                    <p>
                        <button type="submit" name="unmargesiswa" class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#myModal">Hapus Siswa</button>
                    </p>
                    <table id="reset" class="table table-bordered" data-page-length="100" style="font-size: 10px;">
                        <tr style="background-color: orange;">
                            <td style="text-align: center; color: white;">No</td>
                            <td style="text-align: center; color: white;"><input type='checkbox' id='select-all'></td>
                            <td style="text-align: center; color: white;">Nama Siswa</td>
                            <td style="text-align: center; color: white;">NIS</td>
                            <td style="text-align: center; color: white;">Kelamin</td>
                            <td style="text-align: center; color: white;">Agama</td>
                        </tr>
                        <?php  
                    $nomor = 1;
                    $siswa = mysqli_query($mysqli,"SELECT * FROM siswa_kelas
                    JOIN siswa ON siswa_kelas.id_siswa = siswa.id_siswa
                    WHERE id_kelas='$_GET[kl]'
                    ORDER BY nama_siswa ASC");
                    while ($rowsiswa = mysqli_fetch_array($siswa)) {
                    ?>
                        <tr>
                            <td style="text-align: center;"><?php echo $nomor++ ?></td>
                            <td style="text-align: center;">
                                <input type="checkbox" name="siswa[]" value="<?php echo $rowsiswa[id_siswa] ?>">
                            </td>
                            <td style="text-align: left;"><?php echo $rowsiswa['nama_siswa'] ?></td>
                            <td style="text-align: center;"><?php echo $rowsiswa['nis'] ?></td>
                            <td style="text-align: center;"><?php echo $rowsiswa['kelamin'] ?></td>
                            <td style="text-align: center;"><?php echo $rowsiswa['agama'] ?></td>

                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </form>
        </div>
    </div>


    </div>
</section><!-- /.content -->

<?php  
            if (isset($_POST['mapingkelas'])) {
            	$siswa = $_POST['siswa'];

            	$jumlahsiswa = count($siswa);

            	for ($i=0; $i <$jumlahsiswa ; $i++) { 
            		$update = mysqli_query($mysqli,"UPDATE siswa SET aktif='1' WHERE kode_sekolah='$_GET[s]' AND id_siswa='$siswa[$i]'");

            		$insert = mysqli_query($mysqli,"INSERT INTO siswa_kelas (kode_sekolah, tahun, semester, id_siswa, id_kelas)VALUES('$_GET[s]', '$lembaga[tahun]', '$lembaga[semester]', '$siswa[$i]', '$_GET[kl]')");
            	}
            	if ($insert) {
            			?>
<script type="text/javascript">
alert('<?php echo $jumlahsiswa ?> Siswa Berhasil ditambahkan');
window.location.href = "?page=siswa-kelas&s=<?php echo $_GET[s] ?>&kl=<?php echo $_GET[kl] ?>";
</script>
<?php
            		}else{
            			?>
<script type="text/javascript">
alert('<?php echo $jumlahsiswa ?> Gagal ditambahkan');
window.location.href = "?page=siswa-kelas&s=<?php echo $_GET[s] ?>&kl=<?php echo $_GET[kl] ?>";
</script>
<?php
            		}

            }
            ?>



<?php  
    if (isset($_POST['unmargesiswa'])) {
        $siswa = $_POST['siswa'];

        $jumlahsiswa = count($siswa);

            for ($i=0; $i <$jumlahsiswa ; $i++) { 
                $update = mysqli_query($mysqli,"UPDATE siswa SET aktif='0' WHERE kode_sekolah='$_GET[s]' AND id_siswa='$siswa[$i]'");

                $delete = mysqli_query($mysqli,"DELETE FROM siswa_kelas WHERE id_siswa='$siswa[$i]'");

            }
        if ($update) {
            ?>
<script type="text/javascript">
alert('<?php echo $jumlahsiswa ?> Siswa Berhasil Dikeluarkan');
window.location.href = "?page=siswa-kelas&s=<?php echo $_GET[s] ?>&kl=<?php echo $_GET[kl] ?>";
</script>
<?php
            }else{
        ?>
<script type="text/javascript">
alert('<?php echo $jumlahsiswa ?> Gagal Dikeluarkan');
window.location.href = "?page=siswa-kelas&s=<?php echo $_GET[s] ?>&kl=<?php echo $_GET[kl] ?>";
</script>
<?php
        }

    }
?>


<?php } ?>