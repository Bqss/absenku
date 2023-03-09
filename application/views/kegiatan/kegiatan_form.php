<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box box-<?=$box?>'>
                <div class='box-header  with-border'>
                    <h3 class='box-title'>FORMULIR KEGIATAN</h3>
                </div>
                <div class="box-body">
                    <form role="form" id="myForm" data-toggle="validator" action="<?php echo $action; ?>" method="post">
                        <div class="form-group">
                            <label for="kegiatan"> Nama Kegiatan <?php echo form_error('kegiatan') ?></label>
                            <div class="input-group">
                                <input type="text" class="form-control" data-error="Nama kegiatan harus diisi" name="kegiatan" id="kegiatan" placeholder="Nama Kegiatan" value="<?php echo $kegiatan; ?>" required />
                                <span class="input-group-addon">
                                    <span class="fas fa-group"></span>
                                </span>
                            </div>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="lokasi"> Lokasi <?php echo form_error('lokasi') ?></label>
                            <div class="input-group">
                                <input type="text" class="form-control" data-error="Lokasi harus diisi" name="lokasi" id="lokasi" placeholder="Lokasi" value="<?php echo $lokasi; ?>" required />
                                <span class="input-group-addon">
                                    <span class="fas fa-map"></span>
                                </span>
                            </div>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="tgl"> Tanggal <?php echo form_error('tgl') ?></label>
                            <div class="input-group">
                                <input type="date" class="form-control" data-error="Tanggal harus diisi" name="tgl" id="tgl" placeholder="Tanggal" value="<?php echo $tgl; ?>" required />
                                <span class="input-group-addon">
                                    <span class="fas fa-calendar"></span>
                                </span>
                            </div>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="status" class="control-label">Status</label>
                            <div class="input-group">
                                <?php echo form_dropdown('aktif', array('1' => 'AKTIF', '0' => 'TIDAK AKTIF'), $aktif, "class='form-control'"); ?>
                                <span class="input-group-addon">
                                    <span class="fas fa-check"></span>
                                </span>
                            </div>
                            <div class="help-block with-errors"></div>
                        </div>
                        <input type="hidden" name="id_kegiatan" value="<?php echo $id_kegiatan; ?>" />
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-lg btn3d"><?php echo $button ?></button>
                            <a href="<?php echo site_url('kegiatan') ?>" class="btn btn-default btn-lg btn3d">Cancel</a>
                        </div>
                    </form>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
