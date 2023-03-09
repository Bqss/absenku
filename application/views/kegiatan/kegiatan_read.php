<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class="box box-success">
                <div class='box-header with-border'>
                    <h3 class='box-title'>Data Kegiatan</h3>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <td width=250>Nama Kegiatan</td>
                            <td><strong><?php echo $kegiatan_data->kegiatan; ?></strong</td>
                        </tr>
                        <tr>
                            <td>Lokasi</td>
                            <td><?php echo $kegiatan_data->lokasi; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td><?php echo date('d-m-Y', strtotime($kegiatan_data->tgl)); ?></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td><?php if ($kegiatan_data->aktif == 1){ echo "Aktif";} else {echo "Tidak Aktif";} ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align:center;"><a href="<?php echo site_url('kegiatan') ?>" class="btn-xs btn btn-primary">Kembali</a></td>
                        </tr>
                    </table>
                </div><!-- /.box-body -->
            </div>
        </div><!-- /.box -->
    </div><!-- /.col -->
</section><!-- /.content -->