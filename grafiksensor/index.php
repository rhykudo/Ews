<!DOCTYPE html>
<html>
<head>
	<title>Early warning System (EWS)</title>
	<!-- Pemanis Untuk Menampilkan Gambar -->
	<div class="container" style="text-align:center;">
		<img src="assets/img/footprint.png">
	</div>
	<!-- panggil file bootstrap -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<script type="text/javascript" src="assets/js/jquery-3.4.0.min.js"></script>
	<script type="text/javascript" src="assets/js/mdb.min.js"></script>
	<script type="text/javascript" src="jquery-latest.js"></script>

	<!-- memanggil data Grfaik -->
	<script type="text/javascript">
		var refreshid = setInterval(function(){
			$('#responsecontainer').load('data2.php');
		},1000);
	</script>
</head>
<body> 
	
	<!-- tempat untuk tampil Grfaik -->
	<div class="container" style="text-align: center;">
	<!--	<h3> Early warning System (EWS) </h3> -->
		<p> (Program Studi D-III Teknik Elektronika Universitas Jember)</p>
	</div>
	
	<!-- div untuk Grfaik -->
	<div class="container">
		<div class="container" id="responsecontainer" style="width: 80%;text-align:center"></div>
	</div>

	

	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap.min.js"></script>
</body>
</html>