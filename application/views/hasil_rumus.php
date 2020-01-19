<section class="content-header">
    <h1>Penjadwalan Produksi
        <small>Control Panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Penjadwalan</li>
    </ol>
</section>
<section class="content">      

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Hasil Penjadwalan</h3>
        </div>
        <div class="row">
            <div class="col-lg-5">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                    <th>Waktu Penyelesaian Rata-Rata</th>
                    <td><?= $row1['waktupenyelesaianrata2'].' Hari'?></td>
                    </tr>
                    <tr>
                    <th>Utilitas</th>
                    <td><?= $row1['utilitas'].'%'?></td>
                    </tr>
                    <tr>
                    <th>Jumlah Job Rata-Rata</th>
                    <td><?= $row1['jumlahjobrata2'].' Job'?></td>
                    </tr>
                    <tr>
                    <th>Keterlambatan Job Rata-Rata</th>
                    <td><?= $row1['keterlambatanrata2'].' Hari'?></td>
                    </tr>
                    <tr>
                    <th></th>
                    <td></td>
                    </tr>
                </table>
                </div>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="hasil">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Mesin</th>
                        <th>Cetakan</th>
                        <th>Nama Barang</th>
                        <th>Waktu Proses <small>(Hari)</small></th>
                        <th>Completion Time <small>(Hari)</small></th>
                        <th>Tenggat Waktu <small>(Hari)</small></th>
                        <th>Keterlambatan <small>(Hari)</small></th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1;
                    foreach($row->result() as $key => $data) { ?>                    
                    <tr>
                        <td><?=$no++?>.</td>
                        <td><?=$data->mesin?></td>
                        <td><?=$data->cetakan?></td>
                        <td><?=$data->nama_barang?></td>
                        <td><?=$data->waktu_proses?></td>
                        <td><?=$data->completion_time?></td>
                        <td><?=$data->tenggat_waktu?></td>
                        <td><?=$data->keterlambatan?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" href="<?=site_url('produksi/simpan_jadwal/'.$data->no_spkp)?>" class="btn btn-primary" >
            Lanjutkan
        </button>
    </div>
    <div class="pull-right">
                <a href="<?=site_url('produksi/simpan_jadwal/'.$data->no_spkp)?>" class="btn btn-primary btn-flat">
                    <i class=""></i> Lanjutkan
                </a>
            </div>
</section>
