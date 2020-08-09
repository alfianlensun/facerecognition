<div class="bg-primary"
    style="
        height:100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    "
>
    <div
        style="
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
        <button onclick="return submit()" class="btn btn-info btn-block mt-4">Submit</button>
        <a href="<?= base_url('mainmenu') ?>" class="btn btn-info btn-block mt-4">Kembali</a>
    </div>
</div>
<script>
    function submit(){
        let kelas = $('#kelas').val()
        window.location = '/absen/absensi/'+kelas
    }
</script>