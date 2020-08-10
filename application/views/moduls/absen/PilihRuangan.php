<div class="bg-primary"
    style="
        height:100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    "
>
    <h1
        style="color: #fff"
    >Silahkan pilih kelas tempat absensi untuk  melanjutkan</h1>
    <div
        style="
            margin-top: 20px;
            width: 30%;
        "
    >
        
        <select class="custom-select" id="kelas">
        <?php foreach ($kelas as $k): $i=0?>
            <option value="<?= $k['id_mst_kelas'] ?>" <?= $i==0 ? 'selected': '' ?>><?= $k['nama_kelas'] ?></option>
        <?php 
            $i++;
            endforeach ?>
        </select>
        <button onclick="return submit()" class="btn btn-block mt-4" style="background-color: #fff; color: #222">Submit</button>
        <a href="<?= base_url('mainmenu') ?>" class="btn btn-block mt-4" style="background-color: #fff; color: #222">Kembali</a>
    </div>
</div>
<script>
    function submit(){
        let kelas = $('#kelas').val()
        window.location = '/absen/absensi/'+kelas
    }
</script>