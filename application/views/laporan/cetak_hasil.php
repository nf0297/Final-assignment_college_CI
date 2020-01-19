<script type="text/javascript">
	window.print();
</script>
 <br>
            <div align="left">
			<table border=0 width="100%">
			<tr>
			<td>
                <img id="logo-header" src="<?php echo base_url()?>assets/AdminLTE-2.0.5/dist/img/gap.png" height="100" width="100">
				</td>
				<td align=right>PT GALIH AYOM PARAMESTI<br>
				Jln Inspeksi Tarum Barat <br>Pekopen Lambang Jaya Tambun Bekasi 17510, Indonesia. <br>
				Phone: 62(21) 88374577
				Fax: 62(21) 88374576</TD>
				</table>
                 </div>
        <br>
		<hr>

<p> Tanggal Cetak : <?php echo date('Y-m-d'); ?></p>
<h3 align="center">LAPORAN URUTAN PROSES PRODUKSI</h3> 
<!-- <table>
	<tr>
		<td>Tanggal Jadwal </td>
		<td>: <?php echo $record['tanggal'] ?></td>
	</tr>
	<tr>
		<td>Tanggal SPKP dibuat </td>
		<td>: <?php echo $record['tanggal_dibuat'] ?></td>
	</tr>

</table> -->

</div>
<div>
	<br>
<table border="1px" cellspacing="1" cellpadding="1" width="100%" >
                <thead style="text-align: center;">
                    <tr>
                        <th col width="80">Urutan Pengerjaan</th>
                        <th>Nama Produk</th>
                        <th col width="80">Urutan Proses</th>
                        <th>Nama Mesin</th>
                        <th col width="80">Waktu Awal</th>
                        <th col width="80">Waktu Proses</th>
                        <th col width="90">Total Waktu Proses</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($record1 as $hasil) {
                        ?>
                    <tr>
                        <td style="text-align: center;"><?=$no++?></td>
                        <td><?=$hasil->deskripsi_produk."-".$hasil->id_produk?></td>
                        <td style="text-align: center;"><?=$hasil->urutan_proses?></td>
                        <td><?=$hasil->nama_mesin?></td>
                        <td style="text-align: center;"><?=$hasil->ci?></td>
                        <td style="text-align: center;"><?=$hasil->ti?></td>
                        <td style="text-align: center;"><?=$hasil->rj?></td>
                    </tr>
                    <?php 
                    } ?>
                </tbody>
            </table>
</div>
<div align="right">
<!-- <table>
	<tr height="200">
		<td align="center"> Dicetak Oleh </td>
	</tr>
	<br>
	<tr>
		<td align="center"> PPC Manajer</td>
	</tr>
	</table> -->
</div>