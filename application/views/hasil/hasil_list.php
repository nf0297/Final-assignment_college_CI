<section class="content-header">
    <h1>Result
        <small>Hasil</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Result</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
<div class="box">
        <div class="box-header">
            <h3 class="box-title">Schedule Result</h3>
            <div class="pull-right">
                <a href="<?=site_url('cetak/cetak_hasil')?>" target="_blank" class="btn btn-info btn-flat">
                    <i class="fa fa-plus"></i>Cetak
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <!--?php print_r($row->result()) ?-->
            <table id="style1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Urutan Proses</th>
                        <th>Nama Mesin</th>
                        <th>Waktu Awal</th>
                        <th>Waktu Proses</th>
                        <th>Total Waktu Proses</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($detail_data as $hasil) {
                        ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$hasil->deskripsi_produk."-".$hasil->id_produk?></td>
                        <td><?=$hasil->urutan_proses?></td>
                        <td><?=$hasil->nama_mesin?></td>
                        <td><?=$hasil->ci?></td>
                        <td><?=$hasil->ti?></td>
                        <td><?=$hasil->rj?></td>
                    </tr>
                    <?php 
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>