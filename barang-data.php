<h3> Data Obat </h3>
	<table border="1">
		<tr>
			<th>No</th>
			<th>Kategori id</th>
			<th>Kategori nama obat</th>
			<th>Tanggal Beli</th>
			<th>Tanggal Keluar</th>
			<th>Tanggal Expired</th>
		</tr>
		<?php 

			include "db.php";
			$no=1;
			$ambildata = mysqli_query($conn, "select * from tb_kategori");
			while ($tampil = mysqli_fetch_array($ambildata)){
					echo "
					<tr>
						<td>$no</td>
						<td>$tampil[kategori_id]</td>
						<td>$tampil[kategori_nama_obat]</td>
						<td>$tampil[Tanggal_beli]</td>
						<td>$tampil[Tanggal_keluar]</td>
						<td>$tampil[Tanggal_expired]</td>
					</tr>";

					$no++;
				}
			?>
			<br>
		<a href="cetak.php" target="_blank">CETAK</a>

			</br>
		</table>
		</h3>