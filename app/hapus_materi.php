<?php  

$hapusmateri = mysqli_query($mysqli,"DELETE FROM materi WHERE id_materi='$_GET[i]' AND tahun='$sekolah[tahun]' AND semester='$sekolah[semester]' ");

$hapusnformatif = mysqli_query($mysqli,"DELETE FROM n_formatif WHERE id_materi='$_GET[i]' AND tahun='$sekolah[tahun]' AND semester='$sekolah[semester]'");

$hapusnsas = mysqli_query($mysqli,"DELETE FROM n_sas WHERE id_materi='$_GET[i]' AND tahun='$sekolah[tahun]' AND semester='$sekolah[semester]'");

$hapusnsumatif = mysqli_query($mysqli,"DELETE FROM n_sumatif WHERE id_materi='$_GET[i]' AND tahun='$sekolah[tahun]' AND semester='$sekolah[semester]'");

$hapuspsumatif= mysqli_query($mysqli,"DELETE FROM peniaian_sumatif WHERE id_materi='$_GET[i]' AND tahun='$sekolah[tahun]' AND semester='$sekolah[semester]'");

$hapusnilaiproses= mysqli_query($mysqli,"DELETE FROM nilai_proses WHERE id_materi='$_GET[i]' AND tahun='$sekolah[tahun]' AND semester='$sekolah[semester]'");

$hapusnilaiakhir= mysqli_query($mysqli,"DELETE FROM nilai_akhir WHERE id_mapel_kelas='$_GET[ml]' AND tahun='$sekolah[tahun]' AND semester='$sekolah[semester]'");

if ($hapusmateri) {
	?>
	<script type="text/javascript">
		alert('Berhasil');
		window.location.href="?page=mapel&s=<?php echo $_GET['s']?>&ml=<?php echo $_GET['ml']?>";
	</script>
	<?php
}
?>