<style>
    canvas.canvasimg{
        position: relative;
        left: 0;
    }

    .btn-primary-load{
        background-color: #4e73df50;
    }
    
</style>
<div class="row">
    <div class="col-8" 
        id="wrapper"
    >
        <div
            class="mt-2"
            id="videowrapper"
            style="
                width: 720px;
                heigth: 560px;
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
                for (const photo of captureImage){
                    const resultUpload = await new Promise((rs, rj) => {
                        $.ajax({
                            url: '/absen/C_Absen/createRegisterAbsen',
                            method: 'post',
                            data: {
                                photo
                            },
                            dataType: 'json',
                            success:result => rs(result),
                            error:err => rj(err)
                        })
                    })
                    console.log(resultUpload)
                }
            } else {
                let uploading = false
                $(this).addClass('btn-primary').removeClass('btn-primary-load')
                throw new Error('Lengkapi scan wajah anda terlebih dahulu')
            }
        } catch(err){
            let uploading = false
            $(this).addClass('btn-primary').removeClass('btn-primary-load')
            alert(err.message)
        }
    })

    faceStatus = () => {
        
    }
</script>