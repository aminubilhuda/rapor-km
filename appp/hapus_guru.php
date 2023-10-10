<?php  

$dataguru = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM guru WHERE id_guru='$_GET[i]'"));

if($dataguru['penugasan']==1){
	$hapuskelas = mysqli_query($mysqli,"UPDATE kelas SET id_guru='0' WHERE id_guru='$_GET[i]' AND tahun='$lembaga[tahun]' AND semester='$lembaga[semester]'");
}

$hapusmapelampuh = mysqli_query($mysqli,"UPDATE mapel_kelas SET id_guru='0' WHERE id_guru='$_GET[i]' AND tahun='$lembaga[tahun]' AND semester='$lembaga[semester]'");

$hapusguru = mysqli_query($mysqli,"DELETE FROM guru WHERE id_guru='$_GET[i]'");

if($hapusguru){
	?>
	<script type="text/javascript">
		alert('Berhasil');
		window.location.href="?page=pendidik&s=<?php echo $_GET['s'] ?>";
	</script>
	<?php
}


?>