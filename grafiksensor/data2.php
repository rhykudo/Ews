<?php
	//koneksi database
	$konek = mysqli_connect("localhost","root","","grafiksensor");

	//baca data dari tabel tb_sensor

	//baca ID tertinggi
	$sql_ID=mysqli_query($konek,"SELECT MAX(ID) FROM tb_sensor");
	//tanggap datanya
	$data_ID=mysqli_fetch_array($sql_ID);
	//ambil ID terakhir / terbesar
	$ID_akhir = $data_ID['MAX(ID)']; //ID = 8
	$ID_awal=$ID_akhir-60;

	//baca informasi tanggal untuk semua data - sumbu x grafik
	$tanggal = mysqli_query($konek,"SELECT tanggal FROM tb_sensor WHERE ID>='$ID_awal' and ID <= '$ID_akhir' ORDER BY ID ASC");
	//baca informasi suhu untuk semua data - sumbu y di grafik
	$suhu = mysqli_query($konek,"SELECT suhu FROM tb_sensor WHERE ID>='$ID_awal' and ID <= '$ID_akhir'ORDER BY ID ASC");
	$kelembaban = mysqli_query($konek,"SELECT kelembaban FROM tb_sensor WHERE ID>='$ID_awal' and ID <= '$ID_akhir'ORDER BY ID ASC");
	//grafik 2 dan 3
	//baca informasi tanggal untuk semua data - sumbu x grafik
	$gempa = mysqli_query($konek,"SELECT gempa FROM tb_sensor WHERE ID>='$ID_awal' and ID <= '$ID_akhir'ORDER BY ID ASC");
	$angin = mysqli_query($konek,"SELECT angin FROM tb_sensor WHERE ID>='$ID_awal' and ID <= '$ID_akhir'ORDER BY ID ASC");
?>

<!-- tmpilan grafik -->
<div class="panel panel-primary">
	<div class ="panel-heading">
		Grafik Ketinggian Air
	</div>

	<div class="panel-body">
		<!-- siapkan canvas untuk grafik -->
		<canvas id="myChart"></canvas>

		<!-- gambar Grafik -->
		<script type="text/javascript">
			//baca id canvas tempat grafik akan diletakkan
			var canvas = document.getElementById('myChart');
			//letakkan data tangal dan suhu untuk grafik
			var data={
				labels:[
					<?php
						while($data_tanggal=mysqli_fetch_array($tanggal))
						{
							echo '"'.$data_tanggal['tanggal'].'",';
						}
					?>
				],
				datasets : [{
					label:"Ketinggian Air Sungai 1",
					fill:true,
					backgroundColor:"rgba(52,231,43,0",
					borderColor:"rgba(52,231,43,1)",
					lineTension:0.5,
					pointRadius:5,
					data : [
						<?php
							while($data_suhu=mysqli_fetch_array($suhu))
							{
								echo $data_suhu['suhu'].',';
							}
						?>
					]
				},{
					label:"Ketinggian Air Sungai 2",
					fill:true,
					backgroundColor:"rgba(11,58,247,0",
					borderColor:"rgba(11,58,247,1)",
					lineTension:0.5,
					pointRadius:5,
					data : [
						<?php
							while($data_kelembaban=mysqli_fetch_array($kelembaban))
							{
								echo $data_kelembaban['kelembaban'].',';
							}
						?>
					]
				},
				{
					label:"Gempa",
					fill:true,
					backgroundColor:"rgba(0,255,255,0",
					borderColor:"rgba(0,255,255,1)",
					lineTension:0.5,
					pointRadius:5,
					data : [
						<?php
							while($data_gempa=mysqli_fetch_array($gempa))
							{
								echo $data_gempa['gempa'].',';
							}
						?>
					]
				},{
					label:"Kecepatan Angin",
					fill:true,
					backgroundColor:"rgba(255,255,51,0",
					borderColor:"rgba(255,255,51,1)",
					lineTension:0.5,
					pointRadius:5,
					data : [
						<?php
							while($data_angin=mysqli_fetch_array($angin))
							{
								echo $data_angin['angin'].',';
							}
						?>
					]
				}
				]

			};


			//option grafik
			var option={
				showLines:true,
				animation :{duration:0}
			};

			//cetak grafik kedalam canvas
			var myLineChart=Chart.Line(canvas,{
				data:data,
				options:option
			});


		</script>
	</div>
</div>
