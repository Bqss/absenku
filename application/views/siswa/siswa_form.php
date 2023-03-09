<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box box-<?=$box;?>'>
                <div class='box-header  with-border'>
                    <h3 class='box-title'>FORMULIR SISWA</h3>
                </div>
                <div class="box-body">
                    <form role="form" id="myForm" data-toggle="validator" action="<?php echo $action; ?>" method="post">
                    <div class="form-group">
                            <label for="no_induk" class="control-label">No ID</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="no_induk" id="no_induk" data-error="No ID Siswa harus diisi" placeholder="No ID" value="<?php echo $no_induk; ?>" required />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user"></span>
                                </span>
                            </div>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="nama" class="control-label">Nama Siswa</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="nama" id="nama" data-error="Nama Siswa harus diisi" placeholder="Nama Siswa" value="<?php echo $nama; ?>" required />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user"></span>
                                </span>
                            </div>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="ranting" class="control-label">Ranting<?php echo form_error('ranting') ?></label>
                            <div class="input-group">
                                <?php echo cmb_dinamis('ranting', 'ranting', 'siswa', 'ranting', 'ranting', $ranting) ?>
                                <span class="input-group-addon">
                                    <span class="fas fa-briefcase"></span>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir" class="control-label">Tempat Lahir</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" data-error="Tempat Lahir harus diisi" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" required />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user"></span>
                                </span>
                            </div>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="pasaran" class="control-label">Pasaran</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="pasaran" id="pasaran" data-error="Pasaran harus diisi" placeholder="Pasaran" value="<?php echo $pasaran; ?>" required />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user"></span>
                                </span>
                            </div>
                            <div class="help-block with-errors"></div>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id_siswa; ?>" />
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-lg btn3d"><?php echo $button ?></button>
                            <a href="<?php echo site_url('siswa') ?>" class="btn btn-default btn-lg btn3d">Cancel</a>
                        </div>
                    </form>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->