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

?>
		<section class="content-header">
          <h1>
            Database Siswa
            <small>it all starts here</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Database Siswa</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        	<div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border bg-blue">
                  <h3 class="box-title">Daftar Siswa</h3>
                  <div class="box-tools">
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">Tambah Siswa</button>
                  	
                  	<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#uploadsiswa">Upload Siswa</button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <p>
                  	
                  </p>
                  <table id="example1" class="table table-bordered" style="font-size: 11px;" data-page-length="100">
                  	<thead>
                    <tr style="background-color: orange;">
                      <td style="text-align: center; color: white;">No</td>
                      <td style="text-align: center; color: white;">Nama Siswa</td>
                      <td style="text-align: center; color: white;">NIS - NISN</td>
                      <td style="text-align: center; color: white;">Kelamin</td>
                      <td style="text-align: center; color: white;">Agama</td>
                      <td style="text-align: center; color: white;">Tempat, Tanggal Lahir</td>
                      <td style="text-align: center; color: white;">Aksi</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  
                    $nomor = 1;
                    $siswa = mysqli_query($mysqli,"SELECT * FROM siswa WHERE kode_sekolah='$lembaga[kode_sekolah]' AND kls < 3
                    ORDER BY nama_siswa ASC");
                    while ($rowsiswa = mysqli_fetch_array($siswa)) {
                    	
                    ?>
                    <tr>
                    	<td style="text-align: center;"><?php echo $nomor++ ?></td>
                    	<td style="text-align: left;"><?php echo $rowsiswa['nama_siswa'] ?></td>
                    	<td style="text-align: center;"><?php echo $rowsiswa['nis'] ?> - <?php echo $rowsiswa['nisn'] ?></td>
                    	<td style="text-align: center;"><?php echo $rowsiswa['kelamin'] ?></td>
                    	<td style="text-align: center;"><?php echo $rowsiswa['agama'] ?></td>
                    	<td style="text-align: center;"><?php echo $rowsiswa['tempat_lahir'] ?>, <?php echo $rowsiswa['tanggal_lahir'] ?></td>
                    	<td style="text-align: center;">
                    		<a href="?page=edit-siswa&s=<?php echo $_GET['s']?>&i=<?php echo $rowsiswa['id_siswa'] ?>" class="btn btn-success btn-xs"> Edit Data</a>
                    		<a href="#" class="btn btn-danger btn-xs"
                    		data-toggle="modal" data-target="#hapusSISWA<?php echo $rowsiswa['id_siswa']?>"
                    		> Hapus Data</a>
                    	</td>
                    	
                    	<div class="modal fade" id="hapusSISWA<?php echo $rowsiswa['id_siswa']?>" role="dialog">
                          <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header bg-red">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Konfirmasi Hapus Siswa</h4>
                              </div>
                              <div class="modal-body">
                                <form method="POST">
                                    <input type="hidden" name="id_siswa" value="<?php echo $rowsiswa['id_siswa']?>">
                                	<div class="form-group text-center">
                                      <label>Yakin Akan Menghapus P. Didik A/n : <h4><?php echo $rowsiswa['nama_siswa']?></h4> dari dalam database?</label>
                                    </div>
                                
                                    
                                    <div class="modal-footer">  
                                      <button type="submit" name="hapussiswa" class="btn btn-success">Ya, Hapus</button>
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div> 
            
                                  </form>
                              </div>
                            </div>
                          </div>
                        </div>
                   
                    </tr>
                	<?php } ?>
                	</tbody>
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
                    <h4 class="modal-title">Form Tambah Siswa</h4>
                  </div>
                  <div class="modal-body">
                    <form method="POST">
                    	<div class="form-group">
                          <label>Nama Siswa</label>
                          <input type="text" name="nama_siswa" class="form-control input-sm" required="" autocomplete="off" placeholder="Isikan Nama Siswa">
                        </div>
                        <div class="form-group">
                          <label>NIS</label>
                          <input type="text" name="nis" class="form-control input-sm" required="" autocomplete="off" placeholder="Isikan NIS Siswa">
                        </div>
                        <div class="form-group">
                          <label>NISN</label>
                          <input type="text" name="nisn" class="form-control input-sm" required="" autocomplete="off" placeholder="Isikan NISN Siswa">
                        </div>
                        <div class="form-group">
                          <label>Jenis Kelamin</label>
                          <select name="kelamin" class="form-control input-sm" required="">
                          	<option value="" required="">Pilih Jenis Kelamin</option>
                          	<option value="LAKI-LAKI">LAKI-LAKI</option>
                          	<option value="PEREMPUAN">PEREMPUAN</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label>Agama</label>
                          <select name="agama" class="form-control input-sm" required="">
                          	<option value="" required="">Pilih Agama</option>
                          	<option value="ISLAM">ISLAM</option>
                          	<option value="KATHOLIK">KATHOLIK</option>
                            <option value="KRISTEN">KRISTEN</option>
                            <option value="HINDU">HINDU</option>
                            <option value="BUDHA">BUDHA</option>
                            <option value="KONG HU CHU">KONG HU CHU</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Tempat Lahir</label>
                          <input type="text" name="tempat_lahir" class="form-control input-sm" required="" autocomplete="off" placeholder="Isikan Tempat Lahir Siswa">
                        </div>
                        <div class="form-group">
                          <label>Tanggal Lahir</label>
                          <input type="date" name="tanggal_lahir" class="form-control input-sm" required="" autocomplete="off" placeholder="Isikan Tanggal Lahir Siswa">
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
            	$nis = $_POST['nis'];
            	$nisn = $_POST['nisn'];
            	$kelamin = $_POST['kelamin'];
            	$agama = $_POST['agama'];
            	$tempat = $_POST['tempat_lahir'];
            	$tanggal = $_POST['tanggal_lahir'];
            	$kodesekolah = $lembaga['kode_sekolah'];

            	$query = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM siswa WHERE nisn='$nisn' AND kelamin='$kelamin'"));
            	if ($query > 0) {
            		?>
            		<script type="text/javascript">
            			alert('Siswa ini sudah ada!');
            			window.location.href="?page=siswa&s=<?php echo $_GET['s'] ?>";
            		</script>
            		<?php
            	}else{
            		$insert = mysqli_query($mysqli,"INSERT INTO siswa (kode_sekolah, nama_siswa, nis, nisn, kelamin, agama, tempat_lahir, tanggal_lahir)VALUES('$kodesekolah', '$nama', '$nis', '$nisn', '$kelamin', '$agama', '$tempat', '$tanggal')");
            		if ($insert) {
            			?>
	            		<script type="text/javascript">
	            			alert('<?php echo $nama ?> Berhasil ditambahkan');
	            			window.location.href="?page=siswa&s=<?php echo $_GET['s'] ?>";
	            		</script>
	            		<?php
            		}else{
            			?>
	            		<script type="text/javascript">
	            			alert('<?php echo $nama ?> Gagal ditambahkan');
	            			window.location.href="?page=siswa&s=<?php echo $_GET['s'] ?>";
	            		</script>
	            		<?php
            		}
            	}
            }
            ?>
            
            
            
            <?php
            if(isset($_POST['hapussiswa'])){
                $siswa = $_POST['id_siswa'];
                
                $hapussiswakelas = mysqli_query($mysqli,"DELETE FROM siswa_kelas WHERE id_siswa='$siswa' AND tahun='$lembaga[tahun]' AND semester='$lembaga[semester]'");
                $hapussiswa = mysqli_query($mysqli,"DELETE FROM siswa WHERE id_siswa='$siswa' AND kode_sekolah='$lembaga[kode_sekolah]'");
                
                if($hapussiswakelas || $hapussiswa){
                    ?>
                    <script>alert('Berhasil Hapus Siswa');
                    window.location.href="?page=siswa&s=<?php echo $_GET['s']?>";
                    </script>
                    <?php
                }else{
                    ?>
                    <script>alert('Gagal Hapus Siswa');
                    window.location.href="?page=siswa&s=<?php echo $_GET['s']?>";
                    </script>
                    <?php
                }
            }
            ?>
            
            
            <div class="modal fade" id="uploadsiswa" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header bg-red">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color:white;">Form Upload Siswa</h4>
                  </div>
                  <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" action="aksi_upload_siswa.php">
                    	<div class="form-group">
                          <label>Upload File Siswa Excel.</label>
                          <input type="file" name="file_siswa" class="form-control input-sm" required="" autocomplete="off" placeholder="Isikan Nama Siswa">
                        </div>
                        <div class="form-group">
                          <label><a href="../assets/app/doc/format-siswa-excel.xls" target="_blank" >Unduh Format Data Siswa</a></label>
                          
                        </div>
                        
                        <div class="modal-footer">  
                          <button type="submit" name="uploadsiswa" class="btn btn-success">Update</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div> 

                      </form>
                  </div>
                </div>
              </div>
            </div>
            

<?php } ?>