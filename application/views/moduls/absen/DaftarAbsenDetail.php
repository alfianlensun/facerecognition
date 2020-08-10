<style>
    canvas.canvasimg{
        position: relative;
        left: 0;
    }

    .btn-primary-load{
        background-color: #4e73df50;
    }
    
</style>
<input type="hidden" value="<?= $datamahasiswa['id_mst_auth'] ?>" id="id_mst_auth">
<div class="row">
    <div class="col-8" 
        id="wrapper"
    >
        <div class="row">
            <div class="col-12">
                <div class="row pt-4">
                    <div class="col-12">
                        <h5>Data Mahasiswa</h5>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-4">
                                Nama Mahasiswa
                            </div>
                            <div class="col">
                                : <?= $datamahasiswa['nama_mahasiswa'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-4">
                                NIM
                            </div>
                            <div class="col">
                                : <?= $datamahasiswa['nim'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-4">
                                Kelas Sekarang
                            </div>
                            <div class="col">
                                : <?= 'Belum di setting' ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- datamahasiswa -->
            </div>
            <div class="col-12">
                <div
                    class="mt-2"
                    id="videowrapper"
                    style="
                        width: 352px;
                        heigth: 288px;
                        overflow: hidden;
                    "
                >
                    <video id="video"
                        autoplay 
                        muted
                        style="
                            height: 100%;
                            width: 100%;
                        "
                    ></video>
                </div>
            </div>
        </div>
        
    </div>
    <div class="col-4">
        <div class="row">
            <div class="col-lg-12">
                <canvas id="canvas1" class="canvasimg" height="180" width="250" style="background: #eee"> </canvas>
            </div>
            <div class="col-lg-12">
                <canvas id="canvas2" class="canvasimg" height="180" width="250" style="background: #eee"> </canvas>
            </div>
            <div class="col-lg-12">
                <canvas id="canvas3" class="canvasimg" height="180" width="250" style="background: #eee"> </canvas>
            </div>
            <div class="col-lg-12">
                <button type="button" id="simpan" class="btn btn-primary btn-block">Simpan</button>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/js/face-api.min.js') ?>"></script>
<script src="<?= base_url('assets/js/app.js') ?>"></script>

<script>
    let scanning = false
    let scanningComplete = false
    let captureImage = [];
    
    
    onFaceDetection = (faceData) => {
        
        if (scanning === false && scanningComplete === false){
            scanning = true
            const canvas = document.getElementById(`canvas${captureImage.length+1}`)
            const context1 = canvas.getContext('2d')
            
            context1.drawImage(video, 0,0,250, 180)  
            const data = canvas.toDataURL('image/jpeg', 1.0);
            captureImage.push(data)
            if (captureImage.length >= 3){
                scanningComplete = true
            }
            this.setTimeout(() => {
                scanning = false
            }, 3000);
        }  
    }
    let uploading = false
    $('#simpan').on('click', async function(){
        try {
            if (scanningComplete && uploading === false){
                uploading = true
                $(this).html('menyimpan data...<i class="fa fa-spin fa-spinner"></i>', )
                $(this).removeClass('btn-primary').addClass('btn-primary-load')
                let idx = 1
                for (const photo of captureImage){
                    const resultUpload = await new Promise((rs, rj) => {
                        $.ajax({
                            url: base_url+'/absen/C_Absen/createRegisterAbsen',
                            method: 'post',
                            data: {
                                id_mst_auth: $('#id_mst_auth').val(),
                                idx,
                                photo
                            },
                            dataType: 'json',
                            success:result => rs(result),
                            error:err => rj(err)
                        })
                    })
                    idx+=1;
                }

                uploading = false
                window.location = '/absen/register'
            } else {
                uploading = false
                $(this).addClass('btn-primary').removeClass('btn-primary-load')
                $(this).html('Gagal menyimpan data! Simpan ulang?')
                throw new Error('Lengkapi scan wajah anda terlebih dahulu')
            }
        } catch(err){
            uploading = false
            $(this).html('Gagal menyimpan data! Simpan ulang?')
            $(this).addClass('btn-primary').removeClass('btn-primary-load')
        }
    })

    faceStatus = () => {
        
    }
</script>