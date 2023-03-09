<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class="box box-success">
                <div class='box-header with-border'>
                    <h3 class='box-title'>Data Siswa</h3>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                    <table class="table table-bordered">
                        <tr>
                            <td colspan=2 valign="middle"><img src='<?php echo base_url() ?>foto_057/FOTO/<?php echo substr($no_induk,4,4); ?>.JPG' height="150" class="img-fluid"></td>
                        </tr>
                        <tr>
                            <td>Nama Siswa</td>
                            <td><?php echo $nama; ?></td>
                        </tr>
                        <tr>
                            <td>No ID</td>
                            <td><?php echo $no_induk; ?></td>
                        </tr>
                        
                        <tr>
                            <td>Ranting</td>
                            <td><?php echo $ranting; ?></td>
                        </tr>
                        <tr>
                            <td>Rayon</td>
                            <td><?php echo $rayon; ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td><?php echo $jk; ?></td>
                        </tr>
                        <tr>
                            <td>TTL</td>
                            <td><?php echo $tempat_lahir; ?></td>
                        </tr>
                        <tr>
                            <td>Neton</td>
                            <td><?php echo $pasaran; ?></td>
                        </tr>
                        <tr>
                            <td>Agama</td>
                            <td><?php echo $agama; ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><?php echo $alamat; ?></td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td><?php echo $kelas; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align:center;"><a href="<?php echo site_url('siswa') ?>" class="btn-xs btn btn-primary">Kembali</a></td>
                        </tr>
                    </table>
                </div><!-- /.box-body -->
            </div>
        </div><!-- /.box -->
    </div><!-- /.col -->
</section><!-- /.content -->