<?php

$host	= "localhost";
$user	= "root";
$pass	= "";
$db	= "abdira_rapor_km";

//Menggunakan objek mysqli untuk membuat koneksi dan menyimpanya dalam variabel $mysqli	
$mysqli = new mysqli($host, $user, $pass, $db);


//Membuat variabel yang menyimpan url website dan folder website
$url_website = "http://localhost/rapor-km";
$folder_website = "/rapor-km";

//Menentukan timezone 
date_default_timezone_set('Asia/Jakarta'); 

?>