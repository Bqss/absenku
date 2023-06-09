<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class="box box-success">
                <div class='box-header with-border'>
                    <h3 class='box-title'>Data Ayam Jago</h3>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                    <table class="table table-bordered">
                        <tr>
                            <td colspan=2 valign="middle"><img src='<?php echo base_url() ?>foto_057/FOTO/<?php echo substr($no_induk,4,4); ?>.JPG' height="150" class="img-fluid"></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td><?php echo $ayamJago->nama; ?></td>
                        </tr>
                        <tr>
                            <td>Id_ayam_jago</td>
                            <td><?php echo $ayamJago->id_ayam_jago; ?></td>
                        </tr>
                        
                        <tr>
                            <td>TTL</td>
                            <td><?php echo $ayamJago->ttl; ?></td>
                        </tr>
                        <tr>
                            <td>Weton</td>
                            <td><?php echo $ayamJago->weton; ?></td>
                        </tr>
                        <tr>
                            <td>Usia</td>
                            <td><?php echo $ayamJago->usia; ?></td>
                        </tr>
                        <tr>
                            <td>Jenis_Latihan</td>
                            <td><?php echo $ayamJago->jenis_latihan  ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align:center;"><a href="<?php echo site_url('ayamjago') ?>" class="btn-xs btn btn-primary">Kembali</a></td>
                        </tr>
                    </table>
                </div><!-- /.box-body -->
            </div>
        </div><!-- /.box -->
    </div><!-- /.col -->
</section><!-- /.content -->