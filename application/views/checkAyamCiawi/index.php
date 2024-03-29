<section class="content">
    <div class="box p-3 sm:p-6">
        <div class="box-header">
            <h1 class="text-4xl font-bold">Form Cek Ayam Ciawi</h1>
        </div>
        <div class="box-body mt-3 max-w-5xl">
            <div class=" flex flex-col gap-4">
                <div class="flex gap-2 sm:gap-6 items-start w-full flex-col sm:flex-row sm:items-center">
                    <label for="" class="flex-shrink-0">Pilih Camera</label>
                    <select type="text" name="cameraOpt" class=" form-control" id="sourceSelect"></select>
                </div>
                <form action=<?= site_url('cekAyamCiawi/check') ?> method="POST" class=" flex flex-col items-center">
                    <div class="ml-0 flex gap-2 sm:gap-6 items-start w-full flex-col sm:flex-row sm:items-center">
                        <label for="id">No.ID </label>
                        <div class="flex gap-6 w-full sm:w-max sm:flex-1">
                            <input type="text" name="id_ayam_jago" class="form-control" id="result">
                            <button class="btn btn-primary" id="qrTrigger">QR</button>
                        </div>
                    </div>
                    <button class="btn btn-success mt-6">Submit</button>
                </form>
            </div>
            <div class="max-w-2xl mx-auto p-3 sm:p-6 bg-gray-200 mt-8 rounded-2xl">
                <video id="video" width="100%" class="aspect-square bg-white border border-gray-400 rounded-2xl"></video>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/sweetalert/sweetAlert.min.js"></script>
<script>
    <?= $this->session->flashdata('messageAlert'); ?>
</script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/zxing/zxing.min.js"></script>
<script type="text/javascript">
    // mengambil data kamera , yaitu arah kamera ke belakang/ atau depan  
    const getCamName = (cam) => {
        return cam.label.split(",")[1]?.trim();
    }
    window.addEventListener('DOMContentLoaded', function() {
        let selectedDeviceId;
        let audio = new Audio("assets/audio/beep.mp3");
        const qrTrigger = document.querySelector("#qrTrigger");
        const codeReader = new ZXing.BrowserQRCodeReader();


        codeReader.getVideoInputDevices()
            .then((videoInputDevices) => {
                const sourceSelect = document.getElementById('sourceSelect')
                // console.log(videoInputDevices)

                if (videoInputDevices.length >= 0) {
                    videoInputDevices.forEach((element, i) => {
                        const sourceOption = document.createElement('option');
                        if ((localStorage.getItem("selectedDeviceId") == element.deviceId) || getCamName(element) == "facing back" || i == 0 ) {
                            selectedDeviceId = element.deviceId;
                            sourceOption.selected = true;
                        }
                        sourceOption.text = element.label
                        sourceOption.value = element.deviceId
                        sourceSelect.appendChild(sourceOption)
                    })
                    //   decode();
                    // const sourceSelectPanel = document.getElementById('sourceSelectPanel')
                    // sourceSelectPanel.style.display = 'block'
                }
                // handler ketika ganti kamera 
                sourceSelect.onchange = () => {
                    selectedDeviceId = sourceSelect.value;
                    localStorage.setItem("selectedDeviceId", selectedDeviceId);
                    decode();
                }
            })
            .catch((err) => {

            })

        const decode = async (ev) => {
            ev && ev.preventDefault();
            const control = await codeReader.decodeFromVideoDevice(selectedDeviceId, 'video', (result, err, control) => {

                if (result) {
                    console.log(result)
                    document.getElementById('result').value = result.text
                    audio.play();
                    codeReader.reset();
                    control.stop();
                }
            })
        }
        qrTrigger.addEventListener("click", decode)
    })
</script>