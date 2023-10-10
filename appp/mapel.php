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
            Database Mata Pelajaran
            <small>it all starts here</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Database Mata Pelajaran</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        	<div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border bg-blue">
                  <h3 class="box-title">Daftar Mata Pelajaran</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <p>
                  	<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">Tambah Mapel</button>
                  </p>
                  <table class="table table-bordered" style="font-size: 11px;">
                    <tr style="background-color: orange;">
                      <td style="text-align: center; color: white;">No</td>
                      <td style="text-align: center; color: white;">Mata Pelajaran</td>
                      <td style="text-align: center; color: white;">Kode</td>
                      <td style="text-align: center; color: white;">Kategori</td>
                      <td style="text-align: center; color: white;">Aksi</td>
                    </tr>
                    <?php  
                    $nomor = 1;
                    $mapel = mysqli_query($mysqli,"SELECT * FROM mapel WHERE kode_sekolah='$lembaga[kode_sekolah]'
                    ORDER BY kelompok, id_mapel ASC");
                    while ($rowmapel = mysqli_fetch_array($mapel)) {
                    	
                    ?>
                    <tr>
                    	<td style="text-align: center;"><?php echo $nomor++ ?></td>
                    	<td style="text-align: left;"><?php echo strtoupper($rowmapel['nama_mapel']) ?></td>
                    	<td style="text-align: center;"><?php echo strtoupper($rowmapel['smapel']) ?> </td>
                    	<td style="text-align: center;"><?php echo strtoupper($rowmapel['kelompok']) ?></td>
                    	<td style="text-align: center;">
                    		<a href="" class="btn btn-success btn-xs"
                    		data-toggle="modal" data-target="#myModal<?php echo $rowmapel['id_mapel']?>"
                    		> Edit Data</a>

                    		<a href="?page=delete-mapel&s=<?php echo $_GET['s']?>&i=<?php echo $rowmapel['id_mapel'] ?>" onclick="return confirm('Yakin akan menghapus data ?')" class="btn btn-danger btn-xs"> Hapus Data</a>
                    	</td>
                    	<div class="modal fade" id="myModal<?php echo $rowmapel['id_mapel']?>" role="dialog">
			              <div class="modal-dialog">
			                <!-- Modal content-->
			                <div class="modal-content">
			                  <div class="modal-header bg-green">
			                    <button type="button" class="close" data-dismiss="modal">&times;</button>
			                    <h4 class="modal-title">Form Edit Mata Pelajaran</h4>
			                  </div>
			                  <div class="modal-body">
			                    <form method="POST">
			                    	<input type="hidden" name="id_mapel" class="form-control input-sm" required="" autocomplete="off" value="<?php echo $rowmapel['id_mapel'] ?>">
			                    	<div class="form-group">
			                          <label>Mata Pelajaran</label>
			                          <input type="text" name="nama_mapel" class="form-control input-sm" required="" autocomplete="off" value="<?php echo $rowmapel['nama_mapel'] ?>">
			                        </div>
			                        <div class="form-group">
			                          <label>Kode Mata Pelajaran</label>
			                          <input type="text" name="smapel" class="form-control input-sm" required="" autocomplete="off" value="<?php echo $rowmapel['smapel'] ?>">
			                        </div>
			                        
			                        <div class="form-group">
			                          <label>Kelompok Mapel</label>
			                          <select name="kelompok" class="form-control input-sm" required="">
			                          	<option value="" required="">Pilih Kelompok Mapel</option>
                                  <option value="ISLAM" <?php if($rowmapel['kelompok']=="ISLAM"){ echo "selected";}?>>Islam</option>
                                  <option value="KATHOLIK" <?php if($rowmapel['kelompok']=="KATHOLIK"){ echo "selected";}?>>Katholik</option>
                                  <option value="KRISTEN" <?php if($rowmapel['kelompok']=="KRISTEN"){ echo "selected";}?>>Kristen</option>
                                  <option value="HINDU" <?php if($rowmapel['kelompok']=="HINDU"){ echo "selected";}?>>Hindu</option>
                                  <option value="BUDHA" <?php if($rowmapel['kelompok']=="BUDHA"){ echo "selected";}?>>Budha</option>
                                  <option value="KONG HU CHU" <?php if($rowmapel['kelompok']=="KONG HU CHU"){ echo "selected";}?>>Kong Hu Chu</option>
                                  
			                          	<option value="A" <?php if($rowmapel['kelompok']=="A"){ echo "selected";}?>>Wajib A</option>
			                          	<option value="B" <?php if($rowmapel['kelompok']=="B"){ echo "selected";}?>>Wajib B</option>

                                  <?php if($lembaga['jenjang']==4){ ?>

                                  <option value="PEMINATAN" <?php if($rowmapel['kelompok']=="PEMINATAN"){ echo "selected";}?>>Peminatan</option>
                                  <option value="LINTAS MINAT" <?php if($rowmapel['kelompok']=="LINTAS MINAT"){ echo "selected";}?>>Lintas Minat</option>
                                  <?php } ?>

			                          	<option value="Mulok" <?php if($rowmapel['kelompok']=="Mulok"){ echo "selected";}?>>Mulok</option>
			                          </select>
			                        </div>

			                        
			                        <div class="modal-footer">  
			                          <button type="submit" name="simpandataedit" class="btn btn-success">Update</button>
			                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
        	<div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header bg-green">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Form Tambah Mata Pelajaran</h4>
                  </div>
                  <div class="modal-body">
                    <form method="POST">
                    	<div class="form-group">
                          <label>Mata Pelajaran</label>
                          <input type="text" name="nama_mapel" class="form-control input-sm" required="" autocomplete="off" placeholder="Isikan Nama Mata Pelajaran">
                        </div>
                        <div class="form-group">
                          <label>Kode Mata Pelajaran</label>
                          <input type="text" name="smapel" class="form-control input-sm" required="" autocomplete="off" placeholder="Isikan Kode/Singkatan Mata Pelajaran">
                        </div>
                        <div class="form-group">
			                          <label>Kelompok Mapel</label>
			                          <select name="kelompok" class="form-control input-sm" required="">
			                          	<option value="" required="">Pilih Kelompok Mapel</option>
                                  <option value="ISLAM">Islam</option>
                                  <option value="KATHOLIK">Katholik</option>
                                  <option value="KRISTEN">Kristen</option>
                                  <option value="HINDU">Hindu</option>
                                  <option value="BUDHA">Budha</option>
                                  <option value="KONG HU CHU">Kong Hu Chu</option>
			                          	<option value="A" >Wajib A</option>
			                          	<option value="B" >Wajib B</option>
                                  <?php if($lembaga['jenjang']==4){ ?>
                                  <option value="PEMINATAN" >Peminatan</option>
                                  <option value="LINTAS MINAT" >Lintas Minat</option>
                                  <?php } ?>
			                          	<option value="Mulok" >Mulok</option>
			                          </select>
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
            	$nama = $_POST['nama_mapel'];
            	$kelompok = $_POST['kelompok'];
            	$smapel = $_POST['smapel'];

            	$query = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM mapel WHERE nama_mapel='$nama' AND kode_sekolah='$lembaga[kode_sekolah]'"));
            	if ($query > 0) {
            		?>
            		<script type="text/javascript">
            			alert('Siswa ini sudah ada!');
            			window.location.href="?page=mapel&s=<?php echo $_GET['s'] ?>";
            		</script>
            		<?php
            	}else{
            		$insert = mysqli_query($mysqli,"INSERT INTO mapel (kode_sekolah, nama_mapel, kelompok, smapel)VALUES('$lembaga[kode_sekolah]','$nama', '$kelompok', '$smapel')");
            		if ($insert) {
            			?>
	            		<script type="text/javascript">
	            			alert('<?php echo $nama ?> Berhasil ditambahkan');
	            			window.location.href="?page=mapel&s=<?php echo $_GET['s'] ?>";
	            		</script>
	            		<?php
            		}else{
            			?>
	            		<script type="text/javascript">
	            			alert('<?php echo $nama ?> Gagal ditambahkan');
	            			window.location.href="?page=mapel&s=<?php echo $_GET['s'] ?>";
	            		</script>
	            		<?php
            		}
            	}
            }
            ?>


            <?php  
            if (isset($_POST['simpandataedit'])) {
            	$nama = $_POST['nama_mapel'];
            	$kelompok = $_POST['kelompok'];
            	$smapel = $_POST['smapel'];

            		$insert = mysqli_query($mysqli,"UPDATE mapel SET nama_mapel='$nama', kelompok='$kelompok', smapel='$smapel' WHERE id_mapel='$_POST[id_mapel]'");
            		if ($insert) {
            			?>
	            		<script type="text/javascript">
	            			alert('<?php echo $nama ?> Berhasil diperbaharui');
	            			window.location.href="?page=mapel&s=<?php echo $_GET['s'] ?>";
	            		</script>
	            		<?php
            		}else{
            			?>
	            		<script type="text/javascript">
	            			alert('<?php echo $nama ?> Gagal diperbaharui');
	            			window.location.href="?page=mapel&s=<?php echo $_GET['s'] ?>";
	            		</script>
	            		<?php
            		}
            }
            ?>


<?php } ?>