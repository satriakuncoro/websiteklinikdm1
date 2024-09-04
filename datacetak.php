<h3> Data Obat </h3>

<table border="1">
		<tr>
				<th>No</th>
				<th>Produk_id</th>
				<th>kategori_id</th>
				<th>Produk_name</th>
				<th>Produk_price</th>
				<th>Qty</th>
				<th>Tgl_beli</th>
				<th>Tgl_keluar</th>
				<th>Tgl_expired</th>
		</tr>
		<?php 

		include "db.php";

		$no = 1;
		$ambildata = mysqli_query($db,"select * from tb_produk");
		while ($tampil = mysqli_fetch_array($ambildata)){
			echo "
			<tr>
				<td>$no</td>
				<td>$tampil[produk_id]</td>
				<td>$tampil[kategori_id]</td>
				<td>$tampil[produk_name]</td>
				<td>$tampil[produk_price]</td>
				<td>$tampil[qty]</td>
				<td>$tampil[tgl_beli]</td>
				<td>$tampil[tgl_keluar]</td>
				<td>$tampil[tgl_expired]</td>
			</tr>";

			$no++;
		}
		?>
	</table>