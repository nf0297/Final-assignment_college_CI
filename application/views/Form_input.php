<div class="panel-heading" style="background: #dcdcdc">
    <h3>Form Input Pembagian Jalur Pengiriman</h3> 
</div>

<?php

echo form_open('Pengiriman/simpan');
?>

<div class="col-md-12">

<table class="table table-bordered">
			<td width="20%">Nama Perusahaan</td>
		    <td>
               <select name="id_pengguna" id="id_pengguna" class="form-control">
               <?php
			    echo "<option value=''>Silahkan Pilih</option>";
               foreach ($pelanggan as $k) {
					echo "<option value= '$k->id_pengguna'>$k->nama_lengkap </option>";
               }
               ?>
               </select>
			</td>       
		</tr>
		
		<!--<tr>
	<td>ID Perusahaan</td>
	<td><input class = "form-control" type="text" name="id_pengguna" placeholder="ID PERUSAHAAN" required /></td>
	</tr>-->
	
	<tr>
	<td>Lintang x</td>
	<td><input class = "form-control" type="text" name="lintang_x" placeholder="lintang_x"  readonly /></td>
	</tr>
	
	<tr>
	<td>Bujur x</td>
	<td><input class = "form-control" type="text" name="bujur_x" placeholder="bujur_x" readonly /></td>
	</tr>
	
	
	<tr>
	<td>Lintang y</td>
	<td><input class = "form-control" type="text" name="lintang_y" placeholder="lintang_y" readonly /></td>
	</tr>

<tr>
	<td>Bujur y</td>
	<td><input class = "form-control" type="text" name="bujur_y" placeholder="bujur_y" readonly /></td>
	</tr>

	
	<tr>
	<td>Lintang z</td>
	<td><input class = "form-control" type="text" name="lintang_z" placeholder="lintang_z" readonly /></td>
	</tr>


	<tr>
	<td>Bujur z</td>
	<td><input class = "form-control" type="text" name="bujur_z" placeholder="bujur_z" readonly /></td>
	</tr>
	
	<tr>
	<td  colspan="2"><button class="btn btn-primary" type="submit" name="submit"> Tambah Data</button> 
	</td>	
	</tr>

</table>
</form>
</div>


	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
	<script type="text/javascript">
		$(document).ready(function(){
		$('#id_pengguna').change(function(){
        	$('[name="bujur_x"]').val('');
        	$('[name="bujur_x"]').val('');
			$('[name="lintang_x"]').val('');
            $('[name="bujur_y"]').val('');
            $('[name="lintang_y"]').val('');
            $('[name="bujur_z"]').val('');
            $('[name="lintang_z"]').val('');
			var id=$(this).val();
			//alert(id);
			$.ajax({
				url : "<?php echo base_url();?>index.php/pengiriman/titik_koordinat",
				method : "POST",
				data : {id: id},
                    success: function(data){
                    	 // alert('ok');
                    	 // console.log(data);
                    	 var data1 = $.parseJSON(data);  
                    	// alert(data1);
                    	console.log(data1);
                    	$('[name="bujur_x"]').val(data1.bujur_x);
                    	$('[name="bujur_x"]').val(data1.bujur_x);
						$('[name="lintang_x"]').val(data1.lintang_x);
                        $('[name="bujur_y"]').val(data1.bujur_y);
                        $('[name="lintang_y"]').val(data1.lintang_y);
                        $('[name="bujur_z"]').val(data1.bujur_z);
                        $('[name="lintang_z"]').val(data1.lintang_z);
                    	 // console.log(data1.bujur_x);
       //                   $.each(data,function(id_pengguna, bujur_x, lintang_x, bujur_y, lintang_y, bujur_z, lintang_z){
       //                      $('[name="bujur_x"]').val(data.bujur_x);
							// $('[name="lintang_x"]').val(data.lintang_x);
       //                      $('[name="bujur_y"]').val(bujur_y);
       //                      $('[name="lintang_y"]').val(lintang_y);
       //                      $('[name="bujur_z"]').val(bujur_z);
       //                      $('[name="lintang_z"]').val(lintang_z); 
                            
                        // });
                        
                    }
                });
                return false;
           });

		});
	</script>

<div class="col-md-12">
	<table class="table table-bordered table-hover dataTable" border="1">	
		<tr style="background: #dcdcdc">	
			<th class="" colspan="9">Data Pengiriman</th>	
		</tr>
		<tr>
			<th>No</th>
			<th>Nama Perusahaan</th>
			<th>Lintang X</th>
			<th>Bujur X</th>
			<th>Lintang Y</th>
			<th>Bujur Y</th>
			<th>Lintang Z</th>
			<th>Bujur Z</th>
			<th>Aksi</th>
			
		</tr>


		<?php 
		$no = 1;
		foreach ($detail->result() as $d) 
		{ 
			echo "<tr>
			<td>$no</td>
			<td>$d->nama_lengkap</td>
			<td>$d->lintang_x</td>
			<td>$d->bujur_x</td>
			<td>$d->lintang_y</td>
			<td>$d->bujur_y</td>
			<td>$d->lintang_z</td>
			<td>$d->bujur_z</td>
			<td>"
			.anchor('pengiriman/hapusitem/'.$d->id_pj,'Hapus',array('class'=> 'btn btn-danger'))." 
			</td>
			</tr>";
			$no++;
		}
		?>
		<tr>
			<!--<td colspan="4">
			  <button class="btn btn-success" type="button" data-target="#ModalAdd" data-toggle="modal"> Selesai Input</button> 
			</td>-->
			<td  colspan="9"><button class="btn btn-primary" type="button" data-target="#Modalkmeans" data-toggle="modal">Hitung K Means</button> 
	</td>	
		</tr>
	</table>
</div>


<!-- ini modal -->
<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Simpan Pengiriman</h4>
			</div>
			<div class="modal-body">
			<?php
			echo form_open('pengiriman/selesai');
			?>
			<table class="table table-bordered">	
					<tr > 
						<td width="20%">Id Pengiriman</td>
						 <td><input class="form-control" type="text" name="id_pengiriman" placeholder="Id Pengiriman" > </td>
					</tr>
					<tr > 
						<td width="20%">No Packing List</td>
						 <td><input class="form-control" type="text" name="id_pl" placeholder="No Packing List"> </td>
					</tr>
			
<tr > 
						<td width="20%">Tanggal Kirim</td>
						 <td><input class="form-control" type="date" name="tgl_kirim" placeholder="Tanggal Kirim"> </td>
					</tr>
				<tr>

					<td  colspan=3><button class="btn btn-primary" type="submit" name="submit" > Simpan Pengiriman</button> </td>
				<td></td>		
				</tr>

			</table>
			</form>
	
			</div>
		</div>
	</div>
</div>

<!-- ini modal -->
<div id="Modalkmeans" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Simpan Pengiriman</h4>
			</div>
			<div class="modal-body">
			<?php
			echo form_open('Kmeans/CobaRumus');
			?>
			<table class="table table-bordered">	
					<tr > 
						<td width="20%">Jumlah Cluster</td>
						 <td><input class="form-control" type="text" name="jumklas" placeholder="Jumlah Klaster" > </td>
					</tr>
					
				<tr>

					<td  colspan=2><button class="btn btn-primary" type="submit" name="submit"> Lihat hasil</button> </td>
					<!--<td  ><a href='CobaRumus' class='btn btn-danger' role="button">Pengklasterannya</a>
					<button class="btn btn-success" type="submit" name="submit" onclick="window.location.replace('kmeans/CobaRumus');"> Lihat hasil pengklasteran</button> </td>
				--></td>		
				</tr>

			</table>
			</form>
	
			</div>
		</div>
	</div>
</div>