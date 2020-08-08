<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                <div class="col-lg-6">
                    <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Selamat datang di aplikasi absensi</h1>
                    </div>
                    <form class="user" method="post" action="<?= base_url('validate-login') ?>">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control form-control-user" id="username" aria-describedby="emailHelp" placeholder="Masukan username...">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Masukan Password">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block btn-user">Masuk</button>
                        </div>
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="<?= base_url('sign-up') ?>">Daftar</a>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

        </div>

    </div>

</div>