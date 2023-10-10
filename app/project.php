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

	$kelas = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM kelas WHERE id_guru='$guru[id_guru]' "));
  	


  	
?>
		<section class="content-header">
          <h1>
            Project Kelas <?php echo $kelas['nama_kelas'] ?>
            <small>it all starts here</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Project</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        	<div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border bg-blue">
                  <h3 class="box-title">Daftar Project</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                	<p>
                		<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Tambah Project</button>
                	</p>
                	<table class="table table-bordered table-striped" style="font-size: 11px;">
                		<tr style="background-color: orange; color: white;">
                			<td style="text-align: center;">No</td>
                			<td style="text-align: center;">Nama Project</td>
                			<td style="text-align: center; width: 35%;">Deskripsi Project</td>
                			<td style="text-align: center;">Aksi</td>
                		</tr>
                		<?php  
                		$nomor = 1;
                		$project = mysqli_query($mysqli,"SELECT * FROM project WHERE id_kelas='$kelas[id_kelas]' AND tahun='$sekolah[tahun]' AND semester='$sekolah[semester]' ORDER BY id_project ASC");
                		while ($row = mysqli_fetch_array($project)) {
                		?>
                		<tr>
                			<td style="text-align: center;"><?php echo $nomor++ ?></td>
                			<td style="text-align: left;"><?php echo $row['nama_project'] ?></td>
                			<td style="text-align: left;"><?php echo $row['deskripsi_project'] ?></td>
                			<td style="text-align: center;">
                				<a href="?page=detail-project&s=<?php echo $_GET[kode_sekolah] ?>&p=<?php echo $row[id_project] ?>" class="btn btn-danger btn-xs"> Detail</a>
                				<a href="?page=penilaian-project&s=<?php echo $_GET[kode_sekolah] ?>&p=<?php echo $row[id_project] ?>" class="btn btn-success btn-xs"> Penilaian</a>
                				<a href="?page=delete-project&s=<?php echo $_GET[kode_sekolah] ?>&p=<?php echo $row[id_project] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin akan menghapus Project ini?')"> Hapus</a>
                			</td>
                		</tr>
                		<?php } ?>
                	</table>
               </div>
           </div>
       	  </div>
        </section><!-- /.content -->
        <div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
				    <div class="modal-header bg-green">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				        <h4 class="modal-title">Form Tambah Project</h4>
				    </div>
				<form method="POST">
				<div class="modal-body" style="font-size: 11px;">
				<div class="form-group">
					<label>Nama Project</label>
					<input type="text" name="nama_project" class="form-control input-sm" required="" placeholder="Isikan Nama Project">
				</div>
				<div class="form-group">
					<label>Deskripsi Singkat Project</label>
					<textarea name="deskripsi_project" class="form-control input-sm" required="" rows="4"></textarea>
				</div>

				<div class="modal-footer">  
				    <button type="submit" name="simpanproject" class="btn btn-success">Update</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
				</form>
			</div>
		  </div>
		</div>
		</div>

		<?php  
		if (isset($_POST['simpanproject'])) {
			$nama = $_POST['nama_project'];
			$deskripsi = $_POST['deskripsi_project'];

			$simpandata = mysqli_query($mysqli,"INSERT INTO project (tahun, semester, id_kelas, nama_project, deskripsi_project)VALUES('$sekolah[tahun]', '$sekolah[semester]', '$kelas[id_kelas]', '$nama', '$deskripsi')");

			if ($simpandata) {
				?>
				<script type="text/javascript">
					alert('Berhasil menambahkan Project Baru');
					window.location.href="?page=project&kode_sekolah=<?php echo $_GET['kode_sekolah'] ?>";
				</script>
				<?php
			}
		}
		?>


<?php } ?>