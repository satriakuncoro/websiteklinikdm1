
<p align="center" style="font-weight:bold;font-size:16pt">LAPORAN STOK OBAT</p>

<table border="1" align="center">
    <tr>
    <th class="fixed-width">No</th>
			<th class="fixed-width">Kategori nama obat</th>
			<th class="fixed-width">Tanggal Beli</th>
			<th class="fixed-width">Tanggal Keluar</th>
			<th class="fixed-width">Tanggal Expired</th>
			<th class="fixed-width">Stok Obat</th>
			<th class="fixed-width">Harga Beli</th>
			<th class="fixed-width">Harga Jual</th>
</tr>
</table>

<?php 
		$no = 1;
		$ambildata = mysqli_query($conn, "SELECT * FROM tb_kategori");
		$count = 0;
		while ($tampil = mysqli_fetch_array($ambildata)){
		    echo "
		    <tr>
		        <td class='fixed-width'>{$no}</td>
		        <td class='fixed-width'>{$tampil['kategori_nama_obat']}</td>
		        <td class='fixed-width'>{$tampil['Tanggal_beli']}</td>
		        <td class='fixed-width'>{$tampil['Tanggal_keluar']}</td>
		        <td class='fixed-width'>{$tampil['Tanggal_expired']}</td>
		        <td class='fixed-width'>{$tampil['stok_obat']}</td>
		        <td class='fixed-width'>{$tampil['harga_beli']}</td>
		        <td class='fixed-width'>{$tampil['harga_jual']}</td>
		    </tr>";
		    $no++;
		    $count++;
		    if ($count % 30 == 0) {
		        echo '</table><div class="page-break"></div><table>';
		        echo '
		        <tr>
		            <th class="fixed-width">No</th>
		            <th class="fixed-width">Kategori nama obat</th>
		            <th class="fixed-width">Tanggal Beli</th>
		            <th class="fixed-width">Tanggal Keluar</th>
		            <th class="fixed-width">Tanggal Expired</th>
		            <th class="fixed-width">Stok Obat</th>
		            <th class="fixed-width">Harga Beli</th>
		            <th class="fixed-width">Harga Jual</th>
		        </tr>';
		    }
		}
		?>
		</table>
	</div>
</body>
</html>
<?php

<p align="center">
<input type="button" value="Export Excel" onclick="window.open('laporan-excel.php')">
</p>





