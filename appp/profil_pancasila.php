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
            Profil Pancasila
            <small>it all starts here</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-hode"></i> Home</a></li>
            <li class="active">Profil Pancasila</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        	<div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border bg-blue">
                  <h3 class="box-title">Daftar Profil Pancasila</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered" style="font-size: 11px;">
                    <tr style="background-color: orange;">
                      <td style="text-align: center; color: white;">No</td>
                      <td style="text-align: center; color: white;">Dimensi</td>
                      <td style="text-align: center; color: white;">Elemen</td>
                    </tr>
                    <?php  
                    $nomor = 1;
                    $guru = mysqli_query($mysqli,"SELECT * FROM dimensi 
                    ORDER BY id_dimensi ASC");
                    while ($rowguru = mysqli_fetch_array($guru)) {
                    	
                    ?>
                    <tr>
                    	<td style="text-align: center;"><?php echo $nomor++ ?></td>
                    	<td style="text-align: left;"><?php echo $rowguru['dimensi'] ?></td>
                    	<td style="text-align: center;">
                    		<a href="?page=elemen&s=<?php echo $_GET[s] ?>&p=<?php echo $rowguru['id_dimensi'] ?>" class="btn btn-warning btn-xs"> Elemen</a>
                    	</td>
                    	
                    	
                    </tr>
                	<?php } ?>
                   </table>
               	</div>
               </div>
           </div>
       	  </div>
        </section><!-- /.content -->


<?php } ?>