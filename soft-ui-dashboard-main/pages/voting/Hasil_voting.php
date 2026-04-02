<?php
include "../header/koneksi.php";
include "../header/header.php";

$query = mysqli_query($koneksi, "SELECT tbl_calon_ketua.nama_calon, COUNT(tbl_voting.id_calon) AS jumlah FROM tbl_calon_ketua INNER JOIN tbl_voting ON tbl_voting.id_calon=tbl_calon_ketua.id_calon GROUP by tbl_voting.id_calon;");
foreach($query as $data){
  $nama_calon[] = $data['nama_calon'];
  $jumlah_pasien[] = $data['jumlah'];

}
?>
<style>

.card{
    background-color: white;
    padding: 20px;
    border-radius: 20px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}
.card-header{
    background-color: white;
    padding: 20px;
    border-radius: 20px 20px 0 0; /* atas doang */
}
</style>

	<div class="container pt-5">	
		<div class="card-header">
			<h1 class="text-center">Hasil Vote Ketua OSIS</h1>
			<div class="chart-container" style="position: relative; ">
				<canvas id="myChart"></canvas>
			</div>
		</div>
		<div class="card-body">

			<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
			<script>
				<?php 


					
				?>
				const ctx = document.getElementById('myChart');
				new Chart(ctx, {
					type: 'bar',
					data: {
						labels: <?php echo json_encode($nama_calon); ?>,
						datasets: [{
							label: 'Jumlah Vote',
							data: <?php echo json_encode($jumlah_pasien); ?>,
							backgroundColor: [
								'rgba(255, 99, 71, 1)',
								'rgba(9, 31, 242, 0.8)',
								'rgba(255, 128, 6, 0.8)'
								],
							borderColor: [
								'rgba(255, 99, 71, 1)',
								'rgba(9, 31, 242, 0.8)',
								'rgba(255, 128, 6, 0.8)'
								],
							borderWidth: 1
						}]
					},
					options: {
						scales: {
							y: {
								beginAtZero: true
							}
						}
					}
				});
			</script>
		</div>
	</div>
</html>