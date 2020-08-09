<div class="row">
    <div class="col-12 p-4">
        
        <div class="row">
            <div class="col-9">
                <h3>Selamat datang di aplikasi absensi</h3>
                <p>Aplikasi ini di buat demi memudahkan mahasiswa dalam melakukan absensi harian</p>
                <br>
                <h6>Fitur aplikasi ini</h6>
                <div class="row pt-2">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-5">
                                <?php $this->load->view('layout/components/card', [
                                    'title' => 'Registrasi Wajah',
                                    'detail' => 'Registrasi wajah untuk proses absensi',
                                    'route' => 'absen/register/detail/2',
                                    'icon' => 'grin-alt'
                                ]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <img src="<?= base_url('assets/images/loginbackground.png') ?>" alt="" style="width: 100%; ">
            </div>
        </div>
    </div>
</div>