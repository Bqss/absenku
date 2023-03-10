<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <div class='box box-<?= $box; ?>'>
        <div class='box-header  with-border'>
          <h3 class='box-title'>FORMULIR SISWA</h3>
        </div>
        <div class="box-body">
          <form role="form" id="myForm" data-toggle="validator" action="<?php echo $action; ?>" method="post">
            <div class="form-group">
              <label for="no_induk" class="control-label">NIS</label>
              <div class="input-group">
                <input type="text" class="form-control" name="nis" id="nis" data-error="NIS Siswa harus diisi" maxlength="11" placeholder="NIS" required />
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-user"></span>
                </span>
              </div>
              <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
              <label for="nama" class="control-label">Nama Siswa</label>
              <div class="input-group">
                <input type="text" class="form-control" name="nama" id="nama" data-error="Nama Siswa harus diisi" placeholder="Nama Siswa" required />
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-user"></span>
                </span>
              </div>
              <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
              <label for="ranting" class="control-label">Ranting<?php echo form_error('ranting') ?></label>
              <div class="input-group">
                <input type="text" name="ranting" id="ranting" class="form-control"  placeholder="Ranting" >
                <span class="input-group-addon">
                  <span class="fas fa-briefcase"></span>
                </span>
              </div>
            </div>
            <div class="form-group">
              <label for="rayon" class="control-label">Rayon<?php echo form_error('ranting') ?></label>
              <div class="input-group">
                <input type="text" name="rayon" id="rayon" class="form-control" data-error="Rayon harus diisi" placeholder="Rayon" >
                <span class="input-group-addon">
                  <span class="fas fa-briefcase"></span>
                </span>
              </div>
            </div>
            <div class="form-group">
              <label for="jenis_kelamin" class="control-label">Jenis Kelamin<?php echo form_error('ranting') ?></label>
              <div class="input-group">
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control"  data-error="Jenis kelamin harus di isi" required>
                  <option value="" selected disabled>Jenis Kelamin</option>
                  <option value="laki-laki">
                    Laki-laki
                  </option>
                  <option value="perempuan">
                    Perempuan
                  </option>
                </select>
                <span class="input-group-addon">
                  <span class="fas fa-briefcase"></span>
                </span>
                
              </div>
              <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
              <label for="agama" class="control-label">Agama<?php echo form_error('ranting') ?></label>
              <div class="input-group">
                <input type="text" name="agama" id="agama" class="form-control"  placeholder="agama" >
                <span class="input-group-addon">
                  <span class="fas fa-briefcase"></span>
                </span>
              </div>
            </div>
            <div class="form-group">
              <label for="alamat" class="control-label">Alamat<?php echo form_error('ranting') ?></label>
              <div class="input-group">
                <input type="text" name="alamat" id="alamat" class="form-control" placeholder="alamat" >
                <span class="input-group-addon">
                  <span class="fas fa-briefcase"></span>
                </span>
              </div>
            </div>
            <div class="form-group">
              <label for="tempat_lahir" class="control-label">Tempat Lahir</label>
              <div class="input-group">
                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"  placeholder="Tempat Lahir"  />
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-user"></span>
                </span>
              </div>
              <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
              <label for="tanggal_lahir" class="control-label">Tanggal Lahir</label>
              <div class="input-group">
                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"  placeholder="tanggal Lahir"  />
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-user"></span>
                </span>
              </div>
              <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
              <label for="pasaran" class="control-label">Pasaran</label>
              <div class="input-group">
                <input type="text" class="form-control" name="pasaran" id="pasaran"  placeholder="Pasaran"  />
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-user"></span>
                </span>
              </div>
              <div class="help-block with-errors"></div>
            </div>
            <!-- <input type="hidden" name="id" value="<?php echo $id_siswa; ?>" /> -->
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