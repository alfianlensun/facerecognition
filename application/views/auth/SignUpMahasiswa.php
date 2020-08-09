<textarea  id="jsondata" cols="30" rows="10" hidden><?= json_encode($mahasiswa) ?></textarea>
<div class="row p-4">
    <div class="col-12">
        <div class="row">
            <div class="col-12" >
                <form method="post" class="row p-2" action="<?= base_url('auth/C_Auth/createUserMahasiswa') ?>">
                    <div class="col-12 p-4" style="border-radius: 20px; background-color: #4e73df10">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Nama Mahasiswa</label>
                                    <input type="text" class="form-control" name="nama_mahasiswa" id="exampleFormControlInput1" placeholder="Masukan nama mahasiswa" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput2">NIM</label>
                                    <input type="text" class="form-control" name="nim" id="exampleFormControlInput2" placeholder="Masukan NIM" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput3">Password</label>
                                    <input type="password" class="form-control" name="password" id="exampleFormControlInput3" placeholder="Masukan password" required>
                                </div>
                            </div>
                            <div class="col-6 pb-3" style="display: flex; align-items: flex-end; justify-content: flex-end;">
                                <button class="btn btn-primary">Tambah <i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12 mt-4">
        <div class="row">
            <div class="col-12 p-4" style="border-radius: 20px; background-color: #4e73df10">
                <h6><i class="fa fa-list pr-2"></i> Semester</h6>
                <div class="table-responsive mt-4" style="color: #333">
                    <table class="table datatables dt-responsive" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th>Nama Mahasiswa</th>
                                <th>NIM</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                
                                foreach ($mahasiswa as $k) : ?>
                                <tr>
                                    <td><?= $k['nama_mahasiswa'] ?></td>
                                    <td><?= $k['nim'] ?></td>
                                    <td>
                                        <div class="row">
                                            <button class="btn btn-primary btn-sm edit" ids="<?= $k['id_mst_mahasiswa'] ?>">
                                                <i class="fa fa-pen"></i>
                                            </button>
                                            <button 
                                                url="<?= base_url('auth/C_Auth/deleteUserMahasiswa') ?>"
                                                class="btn ml-2 btn-danger btn-sm deletethis" 
                                                ids="<?= $k['id_mst_mahasiswa'] ?>"  
                                                message="Anda yakin ingin menghapus <?= $k['nama_mahasiswa'] ?> dari data mahasiswa?">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
</div>

<div class="modal" tabindex="-1" id="modalEdit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Perbarui Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" class="row p-2" action="<?= base_url('auth/C_Auth/updateUserMahasiswa') ?>">
                    <div class="col-12 p-4" style="border-radius: 20px; background-color: #4e73df10">
                        <div class="row">
                            <input type="hidden" class="form-control id_mst_dosen" name="id_mst_dosen">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Nama Mahasiswa</label>
                                    <input type="text" class="form-control nama_mahasiswa" name="nama_mahasiswa" id="exampleFormControlInput1" placeholder="Masukan nama mahasiswa" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput2">NIP</label>
                                    <input type="text" class="form-control nim" name="nim" id="exampleFormControlInput2" placeholder="Masukan NIM" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput3">Password</label>
                                    <input type="text" class="form-control" name="password" id="exampleFormControlInput3" placeholder="(Kosongkan jika tidak di ganti)">
                                </div>
                            </div>
                            <div class="col-12 pt-2" style="display: flex; align-items: flex-end; justify-content: flex-end;">
                                <button class="btn btn-primary">Simpan Perubahan</button>
                                <button type="button" class="btn btn-secondary ml-2" data-dismiss="modal">Kembali</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(function(){
        $('.edit').unbind().on('click', function(){
            const jsondata = JSON.parse($('#jsondata').val())
            const ids = $(this).attr('ids')
            const selected = jsondata.filter(item => {
                return item.id_mst_mahasiswa == ids
            })
            
            
            renderEditData(selected[0])
            $('#modalEdit').modal('show')
        })
    })
</script>