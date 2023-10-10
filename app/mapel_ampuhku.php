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
  	
  	$mapelkelas = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM mapel_kelas 
  	WHERE id_mapel_kelas='$_GET[ml]' AND kode_sekolah='$_GET[s]' AND tahun='$sekolah[tahun]' AND semester='$sekolah[semester]'"));

  	$kelas = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM kelas WHERE id_kelas='$mapelkelas[id_kelas]' AND kode_sekolah='$_GET[s]'"));

  	$mapel = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM mapel WHERE id_mapel='$mapelkelas[id_mapel]' "));
?>
		<section class="content-header">
          <h1>
            <?php echo $mapel['smapel'] ?> - Kelas <?php echo $kelas['nama_kelas'] ?>
            <small>it all starts here</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-hode"></i> Home</a></li>
            <li class="active">Mapel Ampuhku</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        	<div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border bg-blue">
                  <h3 class="box-title">Daftar Materi Pembelajaran</h3>
                  <br><br>
                  <a href="?page=mapel&data=cp&s=<?php echo $_GET['s']?>&ml=<?php echo $_GET['ml']?>" class="btn btn-warning btn-sm">CP</a>
                  <a href="?page=mapel&data=tp&s=<?php echo $_GET['s']?>&ml=<?php echo $_GET['ml']?>" class="btn btn-danger btn-sm">TP</a>
                  <a href="?page=mapel&data=pembelajaran&s=<?php echo $_GET['s']?>&ml=<?php echo $_GET['ml']?>" class="btn btn-success btn-sm">Pembelajaran</a>
                  
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?php
                    $data = $_GET['data'];
                    if($data == ""){
                        echo "Silahkan Gunakan Tombol Navigasi di atas";
                    }
                    if($data == "cp"){
                        include "cp.php";
                    }
                    if($data == "tp"){
                        include "tp.php";
                    }
                    if($data == "pembelajaran"){
                        include "pembelajaran.php";
                    }
                    if($data == "formatif-ph"){
                        include "formatif-ph.php";
                    }
                    ?>
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
                    <h4 class="modal-title">Form Tambah Materi Pembelajaran</h4>
                  </div>
                  <div class="modal-body">
                    <form method="POST">
                        <div class="form-group">
                          <label>Materi Pembelajaran</label>
                          <textarea name="materi" class="form-control input-sm" rows="5" required=""></textarea>
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
            	$materi = $_POST['materi'];


            		$insert = mysqli_query($mysqli,"INSERT INTO materi (tahun, semester, id_mapel_kelas, materi)VALUES('$sekolah[tahun]', '$sekolah[semester]', '$_GET[ml]', '$materi')");
            		if ($insert) {
            			?>
	            		<script type="text/javascript">
	            			alert('Materi <?php echo $materi ?> Berhasil ditambahkan');
	            			window.location.href="?page=mapel&s=<?php echo $_GET['s'] ?>&ml=<?php echo $_GET[ml] ?>";
	            		</script>
	            		<?php
            		}else{
            			?>
	            		<script type="text/javascript">
	            			alert('Materi <?php echo $nama ?> Gagal ditambahkan');
	            			window.location.href="?page=mapel&s=<?php echo $_GET['s'] ?>&ml=<?php echo $_GET[ml] ?>";
	            		</script>
	            		<?php
            		}
            	
            }
            ?>

            <?php  
            if (isset($_POST['simpandatatujuan'])) {
            	$tujuan = $_POST['tujuan_pembelajaran'];


            		$insert = mysqli_query($mysqli,"INSERT INTO tujuan_pembelajaran (mapel_kelas, id_materi, tujuan_pembelajaran)VALUES('$_GET[ml]','$_POST[id_materi]', '$tujuan')");

            		if ($insert) {
            			?>
	            		<script type="text/javascript">
	            			alert('Tujuan Pembelajaran Berhasil ditambahkan');
	            			window.location.href="?page=mapel&s=<?php echo $_GET['s'] ?>&ml=<?php echo $_GET[ml] ?>";
	            		</script>
	            		<?php
            		}else{
            			?>
	            		<script type="text/javascript">
	            			alert('Tujuan Pembelajaran Gagal ditambahkan');
	            			window.location.href="?page=mapel&s=<?php echo $_GET['s'] ?>&ml=<?php echo $_GET[ml] ?>";
	            		</script>
	            		<?php
            		}
            	
            }
            ?>
<?php } ?>