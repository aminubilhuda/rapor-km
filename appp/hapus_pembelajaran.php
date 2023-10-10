<?php  


$hapusnilaiformatif = mysqli_query($mysqli,"DELETE FROM n_formatif WHERE id_mapel_kelas='$_GET[i]'");
$hapusnilaisumatif = mysqli_query($mysqli,"DELETE FROM n_sumatif WHERE id_mapel_kelas='$_GET[i]'");
$hapusnilaisemester = mysqli_query($mysqli,"DELETE FROM n_sas WHERE id_mapel_kelas='$_GET[i]'");
$hapusnilaiproses = mysqli_query($mysqli,"DELETE FROM nilai_proses WHERE mapel_kelas='$_GET[i]'");
$hapusnilaiakhir = mysqli_query($mysqli,"DELETE FROM nilai_akhir WHERE id_mapel_kelas='$_GET[i]'");
$hapusmateri = mysqli_query($mysqli,"DELETE FROM materi WHERE id_mapel_kelas='$_GET[i]'");
$hapustujuanpembelajaran = mysqli_query($mysqli,"DELETE FROM tujuan_pembelajaran WHERE id_mapel_kelas='$_GET[i]'");

$hapusmapelkelas = mysqli_query($mysqli,"DELETE FROM mapel_kelas WHERE id_mapel_kelas='$_GET[i]'");

if ($hapusmapelkelas) {
	?><script type="text/javascript">alert('Berhasil'); window.location.href="?page=pembelajaran&s=<?php echo $_GET['s'] ?>&kl=<?php echo $_GET['kl'] ?>";</script><?php
}

?>