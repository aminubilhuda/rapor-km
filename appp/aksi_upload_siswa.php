<!-- import excel ke mysql -->
<!-- www.malasngoding.com -->

<?php 
session_start();
if (empty($_SESSION['username']) or empty($_SESSION['password']) ) {
	?>
<script type="text/javascript">
alert('Anda Harus Login Terlebih Dahulu!');
window.location.href = "login.php";
</script>
<?php
}else{
	include "../config/koneksi.php";
	include "../assets/app/excel_reader/excel_reader2.php";
	$login = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM sekolah WHERE username='$_SESSION[username]' AND password='$_SESSION[password]'"));
	$kodesekolah = $login['kode_sekolah'];
?>

<?php
// upload file xls
$target = basename($_FILES['file_siswa']['name']) ;
move_uploaded_file($_FILES['file_siswa']['tmp_name'], $target);
 
// beri permisi agar file xls dapat di baca
chmod($_FILES['file_siswa']['name'],0777);
 
// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['file_siswa']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);
 
// jumlah default data yang berhasil di import
$berhasil = 0;
for ($i=2; $i<=$jumlah_baris; $i++){
 
	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	$nama     = $data->val($i, 2);
	$nis     = $data->val($i, 3);
	$nisn     = $data->val($i, 4);
	$kelamin     = $data->val($i, 5);
	$agama     = $data->val($i, 6);
	$tempatlahir     = $data->val($i, 7);
	$tanggallahir     = $data->val($i, 8);
	$kls     = $data->val($i, 9);
	$alamat     = $data->val($i, 10);
	$kontaksiswa    = $data->val($i, 11);
	$namaayah     = $data->val($i, 12);
	$namaibu     = $data->val($i, 13);
	$pekerjaanayah     = $data->val($i, 14);
	$pekerjaanibu    = $data->val($i, 15);
	$alamatorangtua    = $data->val($i, 16);
	$kontakorangtua    = $data->val($i, 17);
	$hubungandalamkeluarga    = $data->val($i, 18);
	$jumlahsaudara    = $data->val($i, 19);
	$anakke    = $data->val($i, 20);
	$namawali    = $data->val($i, 21);
	$pekerjaanwali    = $data->val($i, 22);
	$alamatwali    = $data->val($i, 23);
	$kontakwali    = $data->val($i, 24);
	$sekolahasal    = $data->val($i, 25);
	$diterimatanggal    = $data->val($i, 26);
	$diterimakelas    = $data->val($i, 27);
	$aktif    = $data->val($i, 28);

 
	if($nama != ""  ){

		$cekdata = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM siswa WHERE nisn='$nisn' AND kode_sekolah='$kodesekolah'"));
		if ($cekdata > 0) {
		$update = mysqli_query($mysqli,"UPDATE siswa SET nama_siswa='$nama', nis='$nis', nisn='$nisn', kelamin='$kelamin', agama='$agama', tempat_lahir='$tempatlahir', tanggal_lahir='$tanggallahir',kls=$kls, alamat_siswa='$alamat',kontak_siswa='$kontaksiswa', nama_ayah='$namaayah', nama_ibu='$namaibu', pekerjaan_ayah='$pekerjaanayah', pekerjaan_ibu='$pekerjaanibu', alamat_orang_tua='$alamatorangtua', kontak_ortu='$kontakorangtua', hubungan_dalam_keluarga='$hubungandalamkeluarga', jumlah_saudara='$jumlahsaudara', anak_ke='$anakke', nama_wali='$namawali', pekerjaan_wali='$pekerjaanwali', alamat_wali='$alamatwali', kontak_wali='$kontakwali', sekolah_asal='$sekolahasal', tanggal_terima='$diterimatanggal', terima_kelas='$diterimakelas', aktif='$aktif' WHERE nisn='$nisn' AND kode_sekolah='$kodesekolah'");
    	if($update){
    	    unlink($_FILES['file_siswa']['name']);
    	    ?><script>
alert('Berhasil Memperbaharui <?php echo $jumlah_baris-1 ?> Data');
window.location.href = "index.php?page=siswa&s=<?php echo $kodesekolah ?>";
</script><?php
    	}	
		}else{
		$update = mysqli_query($mysqli,"INSERT INTO siswa (kode_sekolah, nama_siswa,  nis, nisn, kelamin, agama, tempat_lahir, tanggal_lahir,kls, alamat_siswa, kontak_siswa, nama_ayah, nama_ibu, pekerjaan_ayah, pekerjaan_ibu, alamat_orang_tua, kontak_ortu, hubungan_dalam_keluarga, jumlah_saudara, anak_ke, nama_wali, pekerjaan_wali, alamat_wali, kontak_wali, sekolah_asal, tanggal_terima, terima_kelas, aktif)VALUES('$kodesekolah','$nama', '$nis', '$nisn', '$kelamin', '$agama', '$tempatlahir', '$tanggallahir','$kls', '$alamat','$kontaksiswa', '$namaayah', '$namaibu', '$pekerjaanayah', '$pekerjaanibu', '$alamatorangtua', '$kontakorangtua', '$hubungandalamkeluarga', '$jumlahsaudara', '$anakke', '$namawali', '$pekerjaanwali', '$alamatwali', '$kontakwali', '$sekolahasal', '$diterimatanggal', '$diterimakelas', $aktif)");
    	if($update){
    	    unlink($_FILES['file_siswa']['name']);
    	    ?><script>
alert('Berhasil Menambahkan <?php echo $jumlah_baris-1 ?> Baris Data');
window.location.href = "index.php?page=siswa&s=<?php echo $kodesekolah ?>";
</script><?php
    	}	
		}
		
    		    
   
		
	}
}


}
?>