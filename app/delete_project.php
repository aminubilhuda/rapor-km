<?php  

$hapusproject = mysqli_query($mysqli,"DELETE FROM project WHERE id_project='$_GET[p]' AND tahun='$sekolah[tahun]' AND semester='$sekolah[semester]' ");
$hapusdimensiproject = mysqli_query($mysqli,"DELETE FROM dimensi_project WHERE id_project='$_GET[p]' ");
$hapuselemenproject = mysqli_query($mysqli,"DELETE FROM elemen_project WHERE id_project='$_GET[p]' ");
$hapuspenilaianproject = mysqli_query($mysqli,"DELETE FROM penilaian_project WHERE id_project='$_GET[p]' AND tahun='$sekolah[tahun]' AND semester='$sekolah[semester]'");
$hapuscatatanproject = mysqli_query($mysqli,"DELETE FROM catatan_project WHERE id_project='$_GET[p]' AND tahun='$sekolah[tahun]' AND semester='$sekolah[semester]'");


if ($hapusproject) {
	?>
	<script type="text/javascript">
		alert('Berhasil');
		window.location.href="?page=project&kode_sekolah=<?php echo $_GET['s']?>";
	</script>
	<?php
}
?>