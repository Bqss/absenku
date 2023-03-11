        <!-- Main content -->
        <section class='content'>
            <div class='row'>
                <div class='col-xs-12'>
                    <div class='box box-danger'>
                        <div class='box-header with-border'>
                            <h3 class='box-title'>DATA REKAP ABSENSI BERDASARKAN KEGIATAN
                        </div><!-- /.box-header -->
                        <div class='box-body'>
                            <table class="table table-bordered table-striped" id="mytable">
                                <thead>
                                    <tr>
                                        <th width="20px" style='text-align:center;'>No</th>
                                        <th style='text-align:center;'>Nama Kegiatan</th>
                                        <th style='text-align:center;'>Lokasi</th>
                                        <th style="text-align: center;">Tanggal_kegiatan</th>
                                        <th style="text-align: center;">Total Absensi</th>
                                        <th width="10%" style='text-align:center;'>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($data_kegiatan as $i => $kegiatan ) {
                                        ?>
                                    <tr>
                                        <td style='text-align:center;'><?php echo ++$i ?></td>
                                        <td style='text-align:center;'><?php echo $kegiatan->kegiatan ?></td>
                                        <td style='text-align:center;'><?php echo $kegiatan->lokasi ?></td>
                                        <td style='text-align:center;'><?php echo $kegiatan->tgl ?></td>
                                        <td style='text-align:center;'><?php echo count($this->Presensi_model->getByKegiatan($kegiatan->id_kegiatan)) ?></td>
                                        <td style="text-align:center" width="140px">
                                            <?php echo anchor(site_url('presensi/read/' . $kegiatan->id_kegiatan  ), '<i class="fa fa-eye fa-lg"></i>&nbsp;&nbsp;Lihat', array('title' => 'detail', 'class' => 'btn btn-mdb-color ')); ?>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
                            <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
                            <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
                            <script type="text/javascript">
                                $(document).ready(function() {
                                    $("#mytable").dataTable();
                                });
                            </script>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->