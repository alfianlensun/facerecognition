<textarea  id="jsondata" cols="30" rows="10" hidden><?= json_encode($mahasiswa) ?></textarea>
<div class="row p-4">
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
                                <th>Status Absensi</th>
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
                                        <div class="btn btn-sm <?= $k['status_daftar_absensi'] == 0 ? 'btn-info' : 'btn-success' ?>"><?= $k['status_daftar_absensi'] == 0 ? 'Belum di daftarkan' : 'Terdaftar' ?></div>
                                    </td>
                                    <td>
                                        <?php if ($k['status_daftar_absensi'] == 0) : ?>
                                            <a class="btn btn-primary btn-sm"  href="<?= base_url().'/absen/register/detail/'.$k["id_mst_auth"] ?>">Daftarkan <i class="fa fa-plus"></i></a>
                                        <?php endif; ?>
                                        <?php if ($k['status_daftar_absensi'] == 1) : ?>
                                            <a class="btn btn-info btn-sm"  href="<?= base_url().'/absen/register/detail/'.$k["id_mst_auth"] ?>">Perbarui <i class="fa fa-pen"></i></a>
                                        <?php endif; ?>
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