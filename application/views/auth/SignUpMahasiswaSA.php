<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                    <div class="col-lg-6 d-none d-lg-block"
                        style="
                            background: url('<?= base_url() ?>/assets/images/loginbackground.png');
                            background-position: center;
                            background-size: cover;
                            "
                    ></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900">Pendaftaran Mahasiswa</h1>
                            <p class=" text-gray-900 mb-4">Silahkan lengkapi form berikut untuk melakukan pendaftaran</p>
                        </div>
                        <?php if ($this->session->flashdata('msg')): ?>
                            <div class="alert alert-danger" role="alert">
                                <?= json_decode($this->session->flashdata('msg'), true)['message']; ?>
                            </div>
                        <?php endif ?>
                        <form class="user" id="formsignup" method="post" action="<?= base_url('auth/C_Auth/createUserMahasiswaSA') ?>">
                            <div class="form-group">
                                <input type="text" name="nama_mahasiswa" class="form-control form-control-user" id="nama_mahasiswa" aria-describedby="emailHelp" placeholder="Masukan Nama Mahasiswa...">
                            </div>
                            <div class="form-group">
                                <input type="text" name="nim" class="form-control form-control-user" id="nim" aria-describedby="emailHelp" placeholder="Masukan NIM...">
                            </div>
                            <div class="form-group">
                                <select name="id_mst_kelas" id="" class="custom-select form-control-user" style="height: 50px !important; padding:0!important; padding-left:20px !important; " required>
                                    <?php foreach ($kelas as $k): $i=0?>
                                        <option value="<?= $k['id_mst_kelas'] ?>" <?= $i==0 ? 'selected': '' ?>><?= $k['nama_kelas'] ?></option>
                                    <?php 
                                        $i++;
                                        endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Masukan Password">
                            </div>
                            <div class="form-group">
                                <input type="password" name="confirmpassword" class="form-control form-control-user" id="confirmPassword" placeholder="Konfirmasi Password">
                            </div>
                            <div class="form-group">
                                <button type="submit" id="submit" class="btn btn-primary btn-block btn-user">Daftar</button>
                                <a href="<?= base_url('login') ?>" class="btn btn-primary btn-block btn-user">Login</a>
                            </div>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            

        </div>

    </div>

</div>


<script>
$(function(){
})
</script>