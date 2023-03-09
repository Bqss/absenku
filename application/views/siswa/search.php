<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box box-<?=$box;?>'>
                <div class='box-header  with-border'>
                    <h3 class='box-title'>VALIDASI SISWA</h3>
                </div>
                <div class="box-body">
                    <form role="form" id="myForm" data-toggle="validator" action="<?php echo $action; ?>" method="post">
                    <div class="form-group">
                            <label for="no_induk" class="control-label">No ID</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="no_induk" id="no_induk" data-error="No ID Siswa harus diisi" placeholder="No ID"  required />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user"></span>
                                </span>
                            </div>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-lg btn3d">Cari</button>
                        </div>
                    </form>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->