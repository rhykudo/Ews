<?php
	//koneksi ke database
$konek=mysqli_connect("localhost","root","","grafiksensor");

//tangkap paramater yang dikirim oleh esp32
$suhu= $_GET['suhu'];
$kelembaban= $_GET['kelembaban'];
$gempa= $_GET['gempa'];
$angin= $_GET['angin'];
//simpan ke tabel tb_sensor
//atur id selalu dimulai dari 1
mysqli_query($konek,"ALTER TABLE tb_sensor AUTO_INCREMENT=1");
//simpan nilai suhu dan kelembaban ke tabel tb_sensor
$simpan=mysqli_query($konek,"INSERT INTO tb_sensor(suhu,kelembaban,gempa,angin)VALUES('$suhu','$kelembaban','$gempa','$angin')");

//berikan respon ke esp32
if($simpan)
	echo "Berhasil disimpan";
else
	echo "gagal disimpan";
?>