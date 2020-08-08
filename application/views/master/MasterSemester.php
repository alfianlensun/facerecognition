<textarea  id="jsondata" cols="30" rows="10" hidden><?= json_encode($semester) ?></textarea>
<div class="row p-4">
    <div class="col-12">
        <div class="row">
            <div class="col-12" >
                <form method="post" class="row p-2" action="<?= base_url('master/C_Master/createMasterSemester') ?>">
                    <div class="col-12 p-4" style="border-radius: 20px; background-color: #4e73df10">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Nama Semester</label>
                                    <input type="text" class="form-control" name="nama_semester" id="exampleFormControlInput1" placeholder="Masukan nama semester" required>
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
                                <th>Nama Mata Kuliah</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                
                                foreach ($semester as $k) : ?>
                                <tr>
                                    <td><?= $k['nama_semester'] ?></td>
                                    <td>
                                        <div class="row">
                                            <button class="btn btn-primary btn-sm edit" ids="<?= $k['id_mst_semester'] ?>">
                                                <i class="fa fa-pen"></i>
                                            </button>
                                            <button 
                                                url="<?= base_url('master/C_Master/deleteMasterSemester') ?>"
                                                class="btn ml-2 btn-danger btn-sm deletethis" 
                                                ids="<?= $k['id_mst_semester'] ?>"  
                                                message="Anda yakin ingin menghapus <?= $k['nama_semester'] ?> dari master semester?">
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
                <form method="post" class="row p-2" action="<?= base_url('master/C_Master/updateMasterSemester') ?>">
                    <div class="col-12 p-4" style="border-radius: 20px; background-color: #4e73df10">
                        <div class="row">
                            <input type="hidden" class="form-control id_mst_semester" name="id_mst_semester">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput3">Nama Semester</label>
                                    <input type="text" class="form-control nama_semester" name="nama_semester" id="exampleFormControlInput3" placeholder="Masukan nama semester" required>
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
                return item.id_mst_semester == ids
            })
            
            renderEditData(selected[0])
            $('#modalEdit').modal('show')
        })
    })
</script>