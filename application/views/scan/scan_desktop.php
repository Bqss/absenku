<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
<style media="screen">
  .btn-md {
    padding: 1rem 2.4rem;
    font-size: .94rem;

  }

  .swal2-popup {
    font-family: inherit;
    font-size: 1.2rem;
  }
</style>


<section class='content' id="content">
  <div class='row'>
    <div class='col-xs-12'>
      <div class='box'>
        <div class='box-header' id="QR-Code">
          <h4>Absensi Peserta Menggunakan QR Code</h4>
        </div>
        <div class='box-body'>
          <div class="form-group">
            <form method="post" action="<?php echo $action; ?>">
              <label for="inputName" class="col-md-3 control-label">Kegiatan</label>
              <div class="col-md-7">
                  <div class="form-group">
                    <?= cmb_dinamis_ec2("jenis_kegiatan","jenis_kegiatan",$kegiatan,'kegiatan','id_kegiatan',$prev_kegiatan) ?>
                  </div>
                </select>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-md-3 control-label">Input QR Manual</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" name="qrcode" id="qrcode" maxlength="12">
                </div>
                <div class="col-md-4">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </form>
          </div>

          <div class="form-group">
            <label for="inputName" class="col-md-3 control-label">Pilih Camera</label>
            <div class="col-md-7">
              <select class="form-control" id="camera-select"></select>
            </div>
          </div>
          <div class="col-xs-12 ">
            <div class="well" style="position: middle;">
              <canvas width="400" height="400" class="canvas" id="webcodecam-canvas"></canvas>
              <div class="scanner-laser laser-rightBottom" style="opacity: 0.5;"></div>
              <div class="scanner-laser laser-rightTop" style="opacity: 0.5;"></div>
              <div class="scanner-laser laser-leftBottom" style="opacity: 0.5;"></div>
              <div class="scanner-laser laser-leftTop" style="opacity: 0.5;"></div>
            </div>
          </div>

          <script type="text/javascript" src="<?php echo base_url() ?>assets/dist/js/jquery.min.js"></script>
          <script src="<?php echo base_url() ?>assets/js/qrcodelib.js"></script>
          <script src="<?php echo base_url() ?>assets/js/webcodecamjquery.js"></script>
          <script src="<?php echo base_url() ?>assets/app/core/scan.js"></script>
        </div>
        </form>
      </div>
    </div>
  </div>


</section><!-- /.content -->
<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/sweetalert/sweetAlert.min.js"></script>
<script>
  <?= $this->session->flashdata('messageAlert'); ?>
</script>
<?php /*
<section class='content' id="demo-content">
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'></div>
                <div class='box-body'>
                    <?php
                    $attributes = array('id' => 'button');
                    echo form_open('scan/cek_id',$attributes); ?>
                    <div id="sourceSelectPanel" style="display:none">
                        <label for="sourceSelect">Change video source:</label>
                        <select id="sourceSelect" style="max-width:400px"></select>
                    </div>
                    <div>
                        <video id="video" width="500" height="400" style="border: 1px solid gray"></video>
                    </div>
                    <input type="text" name="jenis_kegiatan" id="jenis_kegiatan" value="kegiatan_cabang">
                    <textarea  name="result" id="result" readonly></textarea>
                    <input type="submit" id="button" class="btn btn-success btn-md" value="Cek Kehadiran">
                    <?php echo form_close();?>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript" src="<?php echo base_url()?>assets/plugins/zxing/zxing.min.js"></script>
<script type="text/javascript">
window.addEventListener('load', function () {
    let selectedDeviceId;
    let audio = new Audio("assets/audio/beep.mp3");
    const codeReader = new ZXing.BrowserQRCodeReader()
    console.log('ZXing code reader initialized')
    codeReader.getVideoInputDevices()
    .then((videoInputDevices) => {
        const sourceSelect = document.getElementById('sourceSelect')
        selectedDeviceId = videoInputDevices[0].deviceId
        if (videoInputDevices.length >= 2) {
            videoInputDevices.forEach((element) => {
                const sourceOption = document.createElement('option')
                sourceOption.text = element.label
                sourceOption.value = element.deviceId
                sourceSelect.appendChild(sourceOption)
            })
            sourceSelect.onchange = () => {
                selectedDeviceId = sourceSelect.value;
            };
            const sourceSelectPanel = document.getElementById('sourceSelectPanel')
            sourceSelectPanel.style.display = 'block'
        }
        codeReader.decodeFromInputVideoDevice(selectedDeviceId, 'video').then((result) => {
            console.log(result)
            document.getElementById('result').textContent = result.text
            if(result != null){
                audio.play();
            }
            $('#button').submit();
        }).catch((err) => {
            console.error(err)
            document.getElementById('result').textContent = err
        })
        console.log(`Started continous decode from camera with id ${selectedDeviceId}`)
    })
    .catch((err) => {
        console.error(err)
    })
})
</script>
*/

?>