<?php
    $hariconvert = ['minggu', 'Senin','Selasa','Rabu', 'Kamis', 'Jumat', 'Sabtu'];
?>
<textarea  id="jsondata" cols="30" rows="10" hidden><?= json_encode($jadwal) ?></textarea>
<div class="row p-4">
    <div class="col-12">
        <div class="row">
            <div class="col-12" >
                <form method="post" class="row p-2" action="<?= base_url('master/C_Master/createJadwalKuliah') ?>">
                    <div class="col-12 p-4" style="border-radius: 20px; background-color: #4e73df10">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Mata Kuliah</label>
                                    <select name="id_mst_mata_kuliah" id="" class="custom-select" required>
                                        <?php foreach ($mk as $m): $i=0?>
                                            <option value="<?= $m['id_mst_mata_kuliah'] ?>" <?= $i==0 ? 'selected': '' ?>><?= $m['nama_mata_kuliah'] ?></option>
                                        <?php 
                                            $i++;
                                            endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Kelas</label>
                                    <select name="id_mst_kelas" id="" class="custom-select" required>
                                        <?php foreach ($kelas as $k): $i=0?>
                                            <option value="<?= $k['id_mst_kelas'] ?>" <?= $i==0 ? 'selected': '' ?>><?= $k['nama_kelas'] ?></option>
                                        <?php 
                                            $i++;
                                            endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Semester</label>
                                    <select name="id_mst_semester" id="" class="custom-select" required>
                                        <?php foreach ($semester as $s): $i=0?>
                                            <option value="<?= $s['id_mst_semester'] ?>" <?= $i==0 ? 'selected': '' ?>><?= $s['nama_semester'] ?></option>
                                        <?php 
                                            $i++;
                                            endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Dosen Pengajar</label>
                                    <select name="id_mst_dosen" id="" class="custom-select" required>
                                        <?php foreach ($dosen as $d): $i=0?>
                                            <option value="<?= $d['id_mst_dosen'] ?>" <?= $i==0 ? 'selected': '' ?>><?= $d['nama_dosen'] ?></option>
                                        <?php 
                                            $i++;
                                            endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Hari</label>
                                    <select name="day" id="" class="custom-select" required>
                                        <option value="0">Minggu</option>
                                        <option value="1">Senin</option>
                                        <option value="2">Selasa</option>
                                        <option value="3">Rabu</option>
                                        <option value="4">Kamis</option>
                                        <option value="5">Jumat</option>
                                        <option value="6">Sabtu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Jam Mulai</label>
                                    <input class="form-control" type="time" name="jam_mulai" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Jam Selesai</label>
                                    <input class="form-control" type="time" name="jam_selesai" required>
                                </div>
                            </div>
                            <div class="col-6 pb-3" style="display: flex; align-items: flex-end;">
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
                <h6><i class="fa fa-list pr-2"></i> Kelas</h6>
                <div class="table-responsive mt-4" style="color: #333">
                    <table class="table datatables dt-responsive" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th>Nama Mata Kuliah</th>
                                <th>Nama Kelas</th>
                                <th>Nama Dosen Pengajar</th>
                                <th>Semester</th>
                                <th>Hari</th>
                                <th>Jam mulai</th>
                                <th>Jam Selesai</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($jadwal as $jdw) : ?>
                                <tr>
                                    <td><?= $jdw['nama_mata_kuliah'] ?></td>
                                    <td><?= $jdw['nama_kelas'] ?></td>
                                    <td><?= $jdw['nama_dosen'] ?></td>
                                    <td><?= $jdw['nama_semester'] ?></td>
                                    <td><?= $hariconvert[$jdw['day']] ?></td>
                                    <td><?= $jdw['jam_mulai'] ?></td>
                                    <td><?= $jdw['jam_selesai'] ?></td>
                                    <td>
                                        <div class="row">
                                            <button class="btn btn-primary btn-sm edit" ids="<?= $jdw['id_trx_jadwal_kuliah'] ?>">
                                                <i class="fa fa-pen"></i>
                                            </button>
                                            <button 
                                                url="<?= base_url('master/C_Master/deleteJadwalKuliah') ?>"
                                                class="btn ml-2 btn-danger btn-sm deletethis" 
                                                ids="<?= $jdw['id_trx_jadwal_kuliah'] ?>"  
                                                message="Anda yakin ingin menghapus data ini?">
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Perbarui Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" class="row p-2" action="<?= base_url('master/C_Master/updateJadwalKuliah') ?>">
                    <div class="col-12 p-4" style="border-radius: 20px; background-color: #4e73df10">
                        <div class="row">
                        <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Mata Kuliah</label>
                                    <select name="id_mst_mata_kuliah" id="" class="id_mst_mata_kuliah custom-select" required>
                                        <?php foreach ($mk as $m): $i=0?>
                                            <option value="<?= $m['id_mst_mata_kuliah'] ?>" <?= $i==0 ? 'selected': '' ?>><?= $m['nama_mata_kuliah'] ?></option>
                                        <?php 
                                            $i++;
                                            endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Kelas</label>
                                    <select name="id_mst_kelas" id="" class="id_mst_kelas custom-select" required>
                                        <?php foreach ($kelas as $k): $i=0?>
                                            <option value="<?= $k['id_mst_kelas'] ?>" <?= $i==0 ? 'selected': '' ?>><?= $k['nama_kelas'] ?></option>
                                        <?php 
                                            $i++;
                                            endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Semester</label>
                                    <select name="id_mst_semester" id="" class="id_mst_semester custom-select" required>
                                        <?php foreach ($semester as $s): $i=0?>
                                            <option value="<?= $s['id_mst_semester'] ?>" <?= $i==0 ? 'selected': '' ?>><?= $s['nama_semester'] ?></option>
                                        <?php 
                                            $i++;
                                            endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Dosen Pengajar</label>
                                    <select name="id_mst_dosen" id="" class="id_mst_dosen custom-select" required>
                                        <?php foreach ($dosen as $d): $i=0?>
                                            <option value="<?= $d['id_mst_dosen'] ?>" <?= $i==0 ? 'selected': '' ?>><?= $d['nama_dosen'] ?></option>
                                        <?php 
                                            $i++;
                                            endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Hari</label>
                                    <select name="day" id="" class="day custom-select" required>
                                        <option value="0">Minggu</option>
                                        <option value="1">Senin</option>
                                        <option value="2">Selasa</option>
                                        <option value="3">Rabu</option>
                                        <option value="4">Kamis</option>
                                        <option value="5">Jumat</option>
                                        <option value="6">Sabtu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Jam Mulai</label>
                                    <input class="form-control jam_mulai" type="time" name="jam_mulai" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Jam Selesai</label>
                                    <input class="form-control jam_selesai" type="time" name="jam_selesai" required>
                                    <input class="form-control id_trx_jadwal_kuliah" type="hidden" name="id_trx_jadwal_kuliah" required>
                                </div>
                            </div>
                            <div class="col-12">
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
                return item.id_trx_jadwal_kuliah == ids
            })
            
            renderEditData(selected[0])
            $('#modalEdit').modal('show')
        })
    })
</script>