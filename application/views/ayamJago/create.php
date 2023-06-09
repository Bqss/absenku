<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box box-<?= $box; ?>'>
                <div class='box-header  with-border'>
                    <h3 class='box-title'>TAMBAHKAN AYAM JAGO</h3>
                </div>
                <div class="box-body">
                    <form role="form" id="myForm" data-toggle="validator" action="<?= site_url("ayamjago/createHandler") ?>" method="post">
                        <div class="form-group">
                            <label for="nama" class="control-label">Nama Ayam Jago</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="nama" id="nama" data-error="Nama Ayam Jago harus diisi" placeholder="Nama Ayam Jago" required />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user"></span>
                                </span>
                            </div>
                            <div class="help-block with-errors"></div>
                        </div> 
                        <div class="form-group">
                            <label for="foto" class="control-label">TTL<?php echo form_error('ranting') ?></label>
                            <div class="input-group">
                                <input type="text" name="TTL" id="TTL" class="form-control" placeholder="TTL"  data-error="Nama Ayam Jago harus diisi" required>
                                <span class="input-group-addon">
                                    <span class="fas fa-briefcase"></span>
                                </span>
                            </div>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="foto" class="control-label">Foto<?php echo form_error('ranting') ?></label>
                            <div class="input-group py-2">
                                <input type="file" name="foto" id="foto" accept="image/*">
                                <span class="input-group-addon">
                                    <span class="fas fa-briefcase"></span>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="weton" class="control-label">Weton<?php echo form_error('ranting') ?></label>
                            <div class="input-group">
                                <input type="text" name="weton" id="weton" class="form-control" data-error="weton harus diisi" placeholder="Weton" required>
                                <span class="input-group-addon">
                                    <span class="fas fa-briefcase"></span>
                                </span>
                            </div>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="usia" class="control-label">Usia<?php echo form_error('ranting') ?></label>
                            <div class="input-group">
                                <div class="input-group">
                                    <input type="number" name="usia" id="usia" class="form-control" data-error="Usia harus diisi" placeholder="Usia" required>
                                    <span class="input-group-addon">
                                        <span class="fas fa-briefcase"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="jenis_latihan" class="control-label">Jenis Latihan<?php echo form_error('ranting') ?></label>
                            <div class="input-group">
                                <select name="jenis_latihan" id="jenis_latihan" class="form-control" data-error="Jenis latihan tidak boleh kosong" required>
                                    <option value="" selected disabled>Jenis Latihan</option>
                                    <option value="private">Private</option>
                                    <option value="regular">Regular</option>
                                </select>
                                <span class="input-group-addon">
                                    <span class="fas fa-briefcase"></span>
                                </span>
                            </div>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-lg btn3d">Submit</button>
                        </div>
                    </form>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->