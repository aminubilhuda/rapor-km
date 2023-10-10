<?php  

$hapustujuan = mysqli_query($mysqli,"DELETE FROM tujuan_pembelajaran WHERE id_tujuan='$_GET[i]' ");

$hapusnformatif = mysqli_query($mysqli,"DELETE FROM n_formatif WHERE id_tujuan='$_GET[i]' AND tahun='$sekolah[tahun]' AND semester='$sekolah[semester]'");

$hapusnsas = mysqli_query($mysqli,"DELETE FROM n_sas WHERE id_tujuan='$_GET[i]' AND tahun='$sekolah[tahun]' AND semester='$sekolah[semester]'");

$hapusnsumatif = mysqli_query($mysqli,"DELETE FROM n_sumatif WHERE id_tujuan='$_GET[i]' AND tahun='$sekolah[tahun]' AND semester='$sekolah[semester]'");

$hapuspsumatif= mysqli_query($mysqli,"DELETE FROM peniaian_sumatif WHERE id_tujuan='$_GET[i]' AND tahun='$sekolah[tahun]' AND semester='$sekolah[semester]'");

$hapusnilaiakhir= mysqli_query($mysqli,"DELETE FROM nilai_akhir WHERE id_mapel_kelas='$_GET[ml]' AND tahun='$sekolah[tahun]' AND semester='$sekolah[semester]'");

if ($hapustujuan) {
	?>
	<script type="text/javascript">
		alert('Berhasil');
		window.location.href="?page=mapel&s=<?php echo $_GET['s']?>&ml=<?php echo $_GET['ml']?>";
	</script>
	<?php
}
?>