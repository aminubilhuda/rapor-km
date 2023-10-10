<?php  

$delete = mysqli_query($mysqli,"DELETE FROM dimensi_project WHERE id_project='$_GET[p]' AND id_dimensi='$_GET[d]'");
if ($delete) {
	?>
	<script type="text/javascript">
		alert('Berhasil');
		window.location.href="?page=detail-project&s=<?php echo $_GET['s'] ?>&p=<?php echo $_GET[p] ?>";
	</script>
	<?php
}

?>