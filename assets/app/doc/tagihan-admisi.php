<?php  
session_start();
ob_start();
if (empty($_SESSION['username']) or empty($_SESSION['password']) ) {
	?>
	<script type="text/javascript">
	alert('Anda Harus Login Terlebih Dahulu!');
	window.location.href="login.php";
	</script>
	<?php
}else{
	include "../../../config/koneksi.php";
	include "../../../config/function_date.php";
	$admin = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM administrator WHERE username='$_SESSION[username]' AND password='$_SESSION[password]'"));
	$akunsekolah = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM sekolah WHERE id_sekolah='$_GET[i]'"));
?>

<!DOCTYPE html>
<html>
<head>
	<title>Akun Pendidik</title>
</head>
<body>
	<table width="790px" style="border-collapse: collapse; font-size: 11px; margin-top: 1px;" >
		<tr>
			<td style="width: 10%; text-align: center;" rowspan="4"><img src="../dist/img/DINAS.png" style="width: 70%;"></td>
			<td style="width: 50%;">PUSAT LAYANAN APLIKASI</td>
			<td style="width: 10%;"></td>
			<td style="width: 30%; text-align: right;" rowspan="4">Surat ini adalah dokumen resmi yang diterbitkan oleh <br><b><?php echo $admin['nama_lembaga'] ?></b> <br> melalui https://kurikulumkita.com/</td>
		</tr>
		<tr>
			<td style="width: 50%; font-size: 20px;"><b><?php echo strtoupper($admin['nama_lembaga'])?></b></td>
			<td style="width: 10%;"></td>
		</tr>
		<tr>
			<td style="width: 50%;"><?php echo $admin['alamat'] ?>, Kab. <?php echo $admin['kabupaten'] ?></td>
			<td style="width: 10%;"></td>
		</tr>
		<tr>
			<td style="width: 50%;">Email : <?php echo $admin['email'] ?>, Kontak : <?php echo $admin['kontak'] ?></td>
			<td style="width: 10%;"></td>
		</tr>
	</table>
	<br>
	<table width="790px" style="border-collapse: collapse; font-size: 11px;" border="1" >
		<tr>
			<td style="width: 100%; padding-left: 5px; font-size: 16px; padding-top: 10px; padding-bottom: 10px;">
				<table width="790px" style="border-collapse: collapse; font-size: 11px;" >
					<tr>
						<td style="width: 80%; padding-left: 5px; font-size: 16px; padding-top: 5px; padding-bottom: 5px;"><b>SURAT TAGIHAN AKTIFASI SEKOLAH PENGGUNA</b><br>
							PUSAT LAYANAN APLIKASI <br>
							<?php echo strtoupper($admin['nama_lembaga']) ?> - KAB. <?php echo strtoupper($admin['kabupaten']) ?>
						</td>
						<td style="width: 20%; text-align: center;">
							<img src="../dist/img/logo.png" style="width: 25%;">
							<br> Merdeka Belajar 2022
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<br>
	<table width="790px" style="border-collapse: collapse; font-size: 11px;">
		<tr>
			<td style="font-size: 14px; width: 50%; padding-left: 25px;">Kepada Yth, <br>
				<b>KEPALA SEKOLAH <?php echo $akunsekolah['nama_sekolah'] ?></b> <br>
				Di Kab. <?php echo $akunsekolah['kabupaten'] ?> - <?php echo $akunsekolah['provinsi'] ?>
			</td>
			<td style="font-size: 14px; width: 20%;">
			</td>
			<td style="font-size: 14px; width: 30%;">
				<table width="400px">
					<tr>
						<td >No. Surat</td>
						<td>:</td>
						<td>001</td>
					</tr>
					<tr>
						<td>Tanggal</td>
						<td>:</td>
						<td><?php echo tgl_indonesia(date('Y-m-d')) ?></td>
					</tr>
					<tr>
						<td>Sifat</td>
						<td>:</td>
						<td>Sangat Rahasia</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<br><br>
	<table width="790px" style="border-collapse: collapse; font-size: 14px; ">
		<tr>
			<td style="width: 95%; padding-left: 25px; line-height: 20px;">
				Dengan hormat, <br><br>
				Sehubungan dengan permintaan saudara untuk menggunakan Layanan Aplikasi Laporan Pendidikan Kurikulum Merdeka Belajar dengan informasi :
			</td>
		</tr>
	</table>
	<br><br><br>
	<table width="500px" style="border-collapse: collapse; font-size: 14px; " align="center" border="1">
		<tr>
			<td style="width: 20%; padding-left: 25px; line-height: 20px; text-align: right; padding-right: 5px; background-color: #b7b5b5; height: 30px;">
				NPSN
			</td>
			<td style="width: 35%; padding-left: 25px; line-height: 20px; text-align: left; padding-left: 5px; height: 30px;">
				<?php echo $akunsekolah['npsn'] ?>
			</td>
		</tr>
		<tr>
			<td style="width: 20%; padding-left: 25px; line-height: 20px; text-align: right; padding-right: 5px; background-color: #b7b5b5; height: 30px;">
				SEKOLAH
			</td>
			<td style="width: 35%; padding-left: 25px; line-height: 20px; text-align: left; padding-left: 5px; height: 30px;">
				<?php echo $akunsekolah['nama_sekolah'] ?>
			</td>
		</tr>
	</table>
	<br><br>
	<table width="790px" style="border-collapse: collapse; font-size: 14px;">
		<tr>
			<td style="width: 95%; padding-left: 25px; line-height: 20px;">
				Maka kami telah melakukan persetujuan dengan Rincian Tagihan untuk penggunaan 1 (satu) Tahun Pelajaran sebagai berikut :
			</td>
		</tr>
	</table>
	<br><br>
	<table width="500px" style="border-collapse: collapse; font-size: 14px;" align="center" border="1">
		<tr>
			<td style="width: 20%; padding-left: 25px; line-height: 20px; text-align: right; padding-right: 5px; background-color: #b7b5b5; height: 30px;">
				Nominal
			</td>
			<td style="width: 35%; padding-left: 25px; line-height: 20px; text-align: left; padding-left: 5px; height: 30px; font-size: 18px;">
				<b>Rp. 100.000,00-</b>
			</td>
		</tr>
		<tr>
			<td style="width: 20%; padding-left: 25px; line-height: 20px; text-align: right; padding-right: 5px; background-color: #b7b5b5; height: 30px;">
				Rekening
			</td>
			<td style="width: 35%; padding-left: 25px; line-height: 20px; text-align: left; padding-left: 5px; height: 30px; font-size: 18px;">
				1046770151
			</td>
		</tr>
		<tr>
			<td style="width: 20%; padding-left: 25px; line-height: 20px; text-align: right; padding-right: 5px; background-color: #b7b5b5; height: 30px;">
				Bank
			</td>
			<td style="width: 35%; padding-left: 25px; line-height: 20px; text-align: left; padding-left: 5px; height: 30px; font-size: 18px;">
				BNI (Bank Negara Indonesia)
			</td>
		</tr>
		<tr>
			<td style="width: 20%; padding-left: 25px; line-height: 20px; text-align: right; padding-right: 5px; background-color: #b7b5b5; height: 30px;">
				Atas Nama
			</td>
			<td style="width: 35%; padding-left: 25px; line-height: 20px; text-align: left; padding-left: 5px; height: 30px; font-size: 18px;">
				Ama B. Mohamad
			</td>
		</tr>
	</table>
	<br><br>
	<table width="790px" style="border-collapse: collapse; font-size: 14px;">
		<tr>
			<td style="width: 97%; padding-left: 25px; line-height: 20px;">
				Setelah anda mengirimkan kembali bukti pembayaran tagihan, maka kami akan mengirimkan kembali Aktifasi Akun sekolah dan selanjutnya Operator Sekolah dapat login ke dalam aplikasi https://kurikulumkita.com/RaportSDSMP. <br> Setelah login, harap dapat melakukan pembaharuan password. Password yang anda buat <b>MUDAH DIINGAT </b> dan <b>AMAN</b>. Anda bertanggung jawab penuh terhadap kerahasian dan keamanan AKUN SEKOLAH Bapak.
			</td>
		</tr>
	</table>
	<br><br><br><br><br>
	<table width="790px" style="border-collapse: collapse; font-size: 14px;">
		<tr>
			<td style="width: 50%; padding-left: 25px; line-height: 20px;">
				
			</td>
			<td style="width: 45%; padding-left: 25px; line-height: 20px; text-align: left;">
				<?php echo $admin['kabupaten'] ?>, <?php echo tgl_indonesia(date('Y-m-d')) ?>
			</td>
		</tr>
		<tr>
			<td style="width: 50%; padding-left: 25px; line-height: 20px;">
				
			</td>
			<td style="width: 45%; padding-left: 25px; line-height: 20px; text-align: left;">
				Hormat kami,
			</td>
		</tr>
		<tr>
			<td style="width: 50%; padding-left: 25px; line-height: 20px; height: 50px;"></td>
			<td style="width: 45%; padding-left: 25px; line-height: 20px; text-align: left; height: 50px;"></td>
		</tr>
		<tr>
			<td style="width: 50%; padding-left: 25px; line-height: 20px;">
				
			</td>
			<td style="width: 45%; padding-left: 25px; line-height: 20px; text-align: left;">
				Admin Kurikulumkita.com, <br>
				<b><?php echo $admin['nama_lembaga'] ?></b> <br>
				<?php echo $admin['kabupaten'] ?> - <?php echo $admin['provinsi'] ?>
			</td>
		</tr>
	</table>

</body>
</html>
<?php 
require_once('../html2pdf/html2pdf.class.php');
$content = ob_get_clean();
$html2pdf = new HTML2PDF('P','A4','en');
$html2pdf->WriteHTML($content);
$html2pdf->Output('TAGIHAN ADMINI '.$akunsekolah['nama_sekolah'].'.pdf');


} ?>