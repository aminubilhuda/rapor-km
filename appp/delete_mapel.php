<?php  
$delete = mysqli_query($mysqli,"DELETE FROM mapel WHERE id_mapel='$_GET[i]'");
if ($delete) {
	?>
	<script type="text/javascript">
		alert('Berhasil dihapus!');
		window.location.href="?page=mapel&s=<?php echo $_GET['s'] ?>";
	</script>
	<?php
}
?>