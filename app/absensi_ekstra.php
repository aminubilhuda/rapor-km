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
	include "../config/koneksi.php";

	$guru = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM guru WHERE kode_guru='$_SESSION[kode_guru]' AND password='$_SESSION[password]'"));
  $kelas = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM kelas WHERE id_guru='$guru[id_guru]'"));
?>


		<section class="content-header">
          <h1>
            Absensi dan EKstrakurikuler
            <small>it all starts here</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-hode"></i> Home</a></li>
            <li class="active">Absensi dan EKstrakurikuler</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        	<div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border bg-blue">
                  <h3 class="box-title">Daftar Absensi dan EKstrakurikuler</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                  <table class="table table-bordered" style="font-size: 11px;">
                    <tr style="background-color: orange;">
                      <td style="text-align: center; color: white;" rowspan="2">No</td>
                      <td style="text-align: center; color: white;" rowspan="2">Nama Siswa</td>
                      <td style="text-align: center; color: white;" colspan="3">KETIDAKHADIRAN</td>
                      <td style="text-align: center; color: white;" colspan="3">EKSTRAKURIKULER</td>
                    </tr>
                    <tr style="background-color: orange;">
                      <td style="text-align: center; color: white;">
                        <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModalSAKIT">S</a>
                      </td>
                      <td style="text-align: center; color: white;">
                        <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModalIZIN">I</a>
                      </td>
                      <td style="text-align: center; color: white;">
                        <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModalTBERITA">TB</a>
                      </td>
                      <td style="text-align: center; color: white; width: 20%;">
                        <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModalpramuka">Pramuka</a>
                      </td>
                      <td style="text-align: center; color: white; width: 20%;">
                        <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModalkesenian">Kesenian</a>
                      </td>
                      <td style="text-align: center; color: white; width: 20%;">
                        <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModalolahraga">Olahraga</a>
                      </td>
                    </tr>
                    <?php  
                    $nomor=1;
                    $siswa = mysqli_query($mysqli,"SELECT * FROM siswa_kelas 
                    JOIN siswa ON siswa_kelas.id_siswa = siswa.id_siswa
                    WHERE id_kelas='$kelas[id_kelas]' ORDER BY nama_siswa ASC");
                    while ($row = mysqli_fetch_array($siswa)) {
                      $absensi = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM absensi WHERE id_siswa='$row[id_siswa]'"));
                      $ekstra = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM ekstra WHERE id_siswa='$row[id_siswa]'"));
                    ?>
                    <tr>
                      <td style="text-align: center;"><?php echo $nomor++ ?></td>
                      <td><?php echo $row['nama_siswa'] ?></td>
                      <td style="text-align: center;"><?php echo $absensi['sakit'] ?></td>
                      <td style="text-align: center;"><?php echo $absensi['izin'] ?></td>
                      <td style="text-align: center;"><?php echo $absensi['apla'] ?></td>
                      <td style="text-align: left;"><?php echo $ekstra['pramuka'] ?></td>
                      <td style="text-align: left;"><?php echo $ekstra['kesenian'] ?></td>
                      <td style="text-align: left;"><?php echo $ekstra['olahraga'] ?></td>
                    </tr>
                    <?php } ?>
                   
                   </table>
               	</div>
               </div>
           </div>
       	  </div>
        </section><!-- /.content -->
        	<div class="modal fade" id="myModalSAKIT" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header bg-green">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Form Tambah Jumlah Absensi Sakit</h4>
                  </div>
                  <div class="modal-body">
                    <form method="POST">
                        <?php  
                        $nomor = 1;
                        $siswakelas = mysqli_query($mysqli,"SELECT * FROM siswa_kelas 
                        JOIN siswa ON siswa_kelas.id_siswa = siswa.id_siswa
                        WHERE id_kelas='$kelas[id_kelas]' ORDER BY nama_siswa ASC");
                        while ($row = mysqli_fetch_array($siswakelas)) {
                          $absensi = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM absensi WHERE id_kelas='$kelas[id_kelas]' AND id_siswa='$row[id_siswa]'"));
                        ?>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label><?php echo $row['nama_siswa'] ?></label>
                            <input type="text" name="jumlah[]" class="form-control input-sm" required="" autocomplete="off" placeholder="Isikan Jumlah Sakit Selama Semester ini." value="<?php echo $absensi['sakit'] ?>">
                            
                            <input type="hidden" name="siswa[]" class="form-control input-sm" required="" autocomplete="off" value="<?php echo $row['id_siswa'] ?>">
                          </div>
                        </div>
                        <?php } ?>

                        <div class="modal-footer">  
                          <button type="submit" name="simpandatasakit" class="btn btn-success">Update</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div> 

                      </form>
                  </div>
                </div>
              </div>
            </div>
            <?php  
            if (isset($_POST['simpandatasakit'])) {
              $sakit = $_POST['jumlah'];
              $nama = $_POST['siswa'];

              $jumlahdata = count($nama);

              for ($i=0; $i <$jumlahdata ; $i++) {

                $query = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM absensi WHERE id_kelas='$kelas[id_kelas]' AND id_siswa='$nama[$i]' "));

                  if ($query > 0) {
                    $update = mysqli_query($mysqli,"UPDATE absensi SET sakit='$sakit[$i]' WHERE id_kelas='$kelas[id_kelas]' AND id_siswa='$nama[$i]'");
                  }else{
                    $update =  mysqli_query($mysqli,"INSERT INTO absensi (tahun, semester, id_kelas, id_siswa, sakit)VALUES('$sekolah[tahun]', '$sekolah[semester]','$kelas[id_kelas]', '$nama[$i]', '$sakit[$i]')");
                  }
                  if ($update) {
                    ?>
                    <script type="text/javascript">
                      alert('Berhasil menambahkan sejumlah absensi SAKIT');
                      window.location.href="?page=absensi-ekstra&s=<?php echo $_GET[s] ?>";
                    </script>
                    <?php
                  }

          
              }
            }

            
            ?>


            <div class="modal fade" id="myModalIZIN" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header bg-green">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Form Tambah Jumlah Absensi Izin</h4>
                  </div>
                  <div class="modal-body">
                    <form method="POST">
                        <?php  
                        $nomor = 1;
                        $siswakelas = mysqli_query($mysqli,"SELECT * FROM siswa_kelas 
                        JOIN siswa ON siswa_kelas.id_siswa = siswa.id_siswa
                        WHERE id_kelas='$kelas[id_kelas]' ORDER BY nama_siswa ASC");
                        while ($row = mysqli_fetch_array($siswakelas)) {
                          $absensi = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM absensi WHERE id_kelas='$kelas[id_kelas]' AND id_siswa='$row[id_siswa]'"));
                        ?>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label><?php echo $row['nama_siswa'] ?></label>
                            <input type="text" name="jumlah[]" class="form-control input-sm" required="" autocomplete="off" placeholder="Isikan Jumlah Sakit Selama Semester ini." value="<?php echo $absensi['izin'] ?>">
                            
                            <input type="hidden" name="siswa[]" class="form-control input-sm" required="" autocomplete="off" value="<?php echo $row['id_siswa'] ?>">
                          </div>
                        </div>
                        <?php } ?>

                        <div class="modal-footer">  
                          <button type="submit" name="simpandataizin" class="btn btn-success">Update</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div> 

                      </form>
                  </div>
                </div>
              </div>
            </div>
            <?php  
            if (isset($_POST['simpandataizin'])) {
              $izin = $_POST['jumlah'];
              $nama = $_POST['siswa'];

              $jumlahdata = count($nama);

              for ($i=0; $i <$jumlahdata ; $i++) {

                $query = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM absensi WHERE id_kelas='$kelas[id_kelas]' AND id_siswa='$nama[$i]' "));

                  if ($query > 0) {
                    $update = mysqli_query($mysqli,"UPDATE absensi SET izin='$izin[$i]' WHERE id_kelas='$kelas[id_kelas]' AND id_siswa='$nama[$i]'");
                  }else{
                    $update =  mysqli_query($mysqli,"INSERT INTO absensi (tahun, semester,id_kelas, id_siswa, izin)VALUES('$sekolah[tahun]', '$sekolah[semester]', '$kelas[id_kelas]', '$nama[$i]', '$izin[$i]')");
                  }
                  if ($update) {
                    ?>
                    <script type="text/javascript">
                      alert('Berhasil menambahkan sejumlah absensi IZIN');
                      window.location.href="?page=absensi-ekstra&s=<?php echo $_GET[s] ?>";
                    </script>
                    <?php
                  }

          
              }
            }

            
            ?>

            <div class="modal fade" id="myModalTBERITA" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header bg-green">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Form Tambah Jumlah Absensi Tanpa Berita</h4>
                  </div>
                  <div class="modal-body">
                    <form method="POST">
                        <?php  
                        $nomor = 1;
                        $siswakelas = mysqli_query($mysqli,"SELECT * FROM siswa_kelas 
                        JOIN siswa ON siswa_kelas.id_siswa = siswa.id_siswa
                        WHERE id_kelas='$kelas[id_kelas]' ORDER BY nama_siswa ASC");
                        while ($row = mysqli_fetch_array($siswakelas)) {
                          $absensi = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM absensi WHERE id_kelas='$kelas[id_kelas]' AND id_siswa='$row[id_siswa]'"));
                        ?>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label><?php echo $row['nama_siswa'] ?></label>
                            <input type="text" name="jumlah[]" class="form-control input-sm" required="" autocomplete="off" placeholder="Isikan Jumlah Sakit Selama Semester ini." value="<?php echo $absensi['alpa'] ?>">
                            
                            <input type="hidden" name="siswa[]" class="form-control input-sm" required="" autocomplete="off" value="<?php echo $row['id_siswa'] ?>">
                          </div>
                        </div>
                        <?php } ?>

                        <div class="modal-footer">  
                          <button type="submit" name="simpandataalpa" class="btn btn-success">Update</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div> 

                      </form>
                  </div>
                </div>
              </div>
            </div>
            <?php  
            if (isset($_POST['simpandataalpa'])) {
              $alpa = $_POST['jumlah'];
              $nama = $_POST['siswa'];

              $jumlahdata = count($nama);

              for ($i=0; $i <$jumlahdata ; $i++) {

                $query = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM absensi WHERE id_kelas='$kelas[id_kelas]' AND id_siswa='$nama[$i]' "));

                  if ($query > 0) {
                    $update = mysqli_query($mysqli,"UPDATE absensi SET apla='$alpa[$i]' WHERE id_kelas='$kelas[id_kelas]' AND id_siswa='$nama[$i]'");
                  }else{
                    $update =  mysqli_query($mysqli,"INSERT INTO absensi (tahun, semester, id_kelas, id_siswa, apla)VALUES('$sekolah[tahun]', '$sekolah[semester]','$kelas[id_kelas]', '$nama[$i]', '$alpa[$i]')");
                  }
                  if ($update) {
                    ?>
                    <script type="text/javascript">
                      alert('Berhasil menambahkan sejumlah absensi TANPA BERITA');
                      window.location.href="?page=absensi-ekstra&s=<?php echo $_GET[s] ?>";
                    </script>
                    <?php
                  }

          
              }
            }

            
            ?>


            <div class="modal fade" id="myModalpramuka" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header bg-green">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Form Tambah Kegiatan Pramuka</h4>
                  </div>
                  <div class="modal-body">
                    <form method="POST">
                        <?php  
                        $nomor = 1;
                        $siswakelas = mysqli_query($mysqli,"SELECT * FROM siswa_kelas 
                        JOIN siswa ON siswa_kelas.id_siswa = siswa.id_siswa
                        WHERE id_kelas='$kelas[id_kelas]' ORDER BY nama_siswa ASC");
                        while ($row = mysqli_fetch_array($siswakelas)) {
                          $ekstra = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM ekstra WHERE id_kelas='$kelas[id_kelas]' AND id_siswa='$row[id_siswa]'"));
                        ?>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label><?php echo $row['nama_siswa'] ?></label>
                            <textarea name="jumlah[]" class="form-control input-sm" rows="2"><?php echo $ekstra['pramuka'] ?></textarea>
                            
                            <input type="hidden" name="siswa[]" class="form-control input-sm" required="" autocomplete="off" value="<?php echo $row['id_siswa'] ?>">
                          </div>
                        </div>
                        <?php } ?>
                        <div class="modal-footer">  
                          <button type="submit" name="simpandatapramuka" class="btn btn-success">Update</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div> 

                      </form>
                  </div>
                </div>
              </div>
            </div>
            <?php  
            if (isset($_POST['simpandatapramuka'])) {
              $pramuka = $_POST['jumlah'];
              $nama = $_POST['siswa'];

              $jumlahdata = count($nama);

              for ($i=0; $i <$jumlahdata ; $i++) {

                $query = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM ekstra WHERE id_kelas='$kelas[id_kelas]' AND id_siswa='$nama[$i]' "));

                  if ($query > 0) {
                    $update = mysqli_query($mysqli,"UPDATE ekstra SET pramuka='$pramuka[$i]' WHERE id_kelas='$kelas[id_kelas]' AND id_siswa='$nama[$i]'");
                  }else{
                    $update =  mysqli_query($mysqli,"INSERT INTO ekstra (tahun, semester, id_kelas, id_siswa, pramuka)VALUES('$sekolah[tahun]', '$sekolah[semester]','$kelas[id_kelas]', '$nama[$i]', '$pramuka[$i]')");
                  }
                  if ($update) {
                    ?>
                    <script type="text/javascript">
                      alert('Berhasil menambahkan sejumlah Ekstra Pramuka');
                      window.location.href="?page=absensi-ekstra&s=<?php echo $_GET[s] ?>";
                    </script>
                    <?php
                  }

          
              }
            }

            
            ?>

            <div class="modal fade" id="myModalkesenian" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header bg-green">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Form Tambah Kegiatan Kesenian</h4>
                  </div>
                  <div class="modal-body">
                    <form method="POST">
                        <?php  
                        $nomor = 1;
                        $siswakelas = mysqli_query($mysqli,"SELECT * FROM siswa_kelas 
                        JOIN siswa ON siswa_kelas.id_siswa = siswa.id_siswa
                        WHERE id_kelas='$kelas[id_kelas]' ORDER BY nama_siswa ASC");
                        while ($row = mysqli_fetch_array($siswakelas)) {
                          $ekstra = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM ekstra WHERE id_kelas='$kelas[id_kelas]' AND id_siswa='$row[id_siswa]'"));
                        ?>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label><?php echo $row['nama_siswa'] ?></label>
                            <textarea name="jumlah[]" class="form-control input-sm" rows="2"><?php echo $ekstra['kesenian'] ?></textarea>
                            
                            <input type="hidden" name="siswa[]" class="form-control input-sm" required="" autocomplete="off" value="<?php echo $row['id_siswa'] ?>">
                          </div>
                        </div>
                        <?php } ?>
                        <div class="modal-footer">  
                          <button type="submit" name="simpandatakesenian" class="btn btn-success">Update</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div> 

                      </form>
                  </div>
                </div>
              </div>
            </div>
            <?php  
            if (isset($_POST['simpandatakesenian'])) {
              $kesenian = $_POST['jumlah'];
              $nama = $_POST['siswa'];
              $jumlahdata = count($nama);

              for ($i=0; $i <$jumlahdata ; $i++) {

                $query = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM ekstra WHERE id_kelas='$kelas[id_kelas]' AND id_siswa='$nama[$i]' "));

                  if ($query > 0) {
                    $update = mysqli_query($mysqli,"UPDATE ekstra SET kesenian='$kesenian[$i]' WHERE id_kelas='$kelas[id_kelas]' AND id_siswa='$nama[$i]'");
                  }else{
                    $update =  mysqli_query($mysqli,"INSERT INTO ekstra (tahun, semester, id_kelas, id_siswa, kesenian)VALUES('$sekolah[tahun]', '$sekolah[semester]','$kelas[id_kelas]', '$nama[$i]', '$kesenian[$i]')");
                  }
                  if ($update) {
                    ?>
                    <script type="text/javascript">
                      alert('Berhasil menambahkan sejumlah Ekstra Pramuka');
                      window.location.href="?page=absensi-ekstra&s=<?php echo $_GET[s] ?>";
                    </script>
                    <?php
                  }

          
              }
            }

            
            ?>


            <div class="modal fade" id="myModalolahraga" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header bg-green">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Form Tambah Kegiatan Olahraga</h4>
                  </div>
                  <div class="modal-body">
                    <form method="POST">
                        <?php  
                        $nomor = 1;
                        $siswakelas = mysqli_query($mysqli,"SELECT * FROM siswa_kelas 
                        JOIN siswa ON siswa_kelas.id_siswa = siswa.id_siswa
                        WHERE id_kelas='$kelas[id_kelas]' ORDER BY nama_siswa ASC");
                        while ($row = mysqli_fetch_array($siswakelas)) {
                          $ekstra = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM ekstra WHERE id_kelas='$kelas[id_kelas]' AND id_siswa='$row[id_siswa]'"));
                        ?>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label><?php echo $row['nama_siswa'] ?></label>
                            <textarea name="jumlah[]" class="form-control input-sm" rows="2"><?php echo $ekstra['olahraga'] ?></textarea>
                            
                            <input type="hidden" name="siswa[]" class="form-control input-sm" required="" autocomplete="off" value="<?php echo $row['id_siswa'] ?>">
                          </div>
                        </div>
                        <?php } ?>
                        <div class="modal-footer">  
                          <button type="submit" name="simpandataolahraga" class="btn btn-success">Update</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div> 

                      </form>
                  </div>
                </div>
              </div>
            </div>
            <?php  
            if (isset($_POST['simpandataolahraga'])) {
              $olahraga = $_POST['jumlah'];
              $nama = $_POST['siswa'];
              $jumlahdata = count($nama);

              for ($i=0; $i <$jumlahdata ; $i++) {

                $query = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM ekstra WHERE id_kelas='$kelas[id_kelas]' AND id_siswa='$nama[$i]' "));

                  if ($query > 0) {
                    $update = mysqli_query($mysqli,"UPDATE ekstra SET olahraga='$olahraga[$i]' WHERE id_kelas='$kelas[id_kelas]' AND id_siswa='$nama[$i]'");
                  }else{
                    $update =  mysqli_query($mysqli,"INSERT INTO ekstra (tahun, semester, id_kelas, id_siswa, olahraga)VALUES('$sekolah[tahun]', '$sekolah[semester]','$kelas[id_kelas]', '$nama[$i]', '$olahraga[$i]')");
                  }
                  if ($update) {
                    ?>
                    <script type="text/javascript">
                      alert('Berhasil menambahkan sejumlah Ekstra Olahraga');
                      window.location.href="?page=absensi-ekstra&s=<?php echo $_GET[s] ?>";
                    </script>
                    <?php
                  }

          
              }
            }

            
            ?>
           

<?php } ?>