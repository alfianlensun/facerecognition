<textarea  id="jsondata" cols="30" rows="10" hidden><?= json_encode($kelas) ?></textarea>
<div class="row p-4">
    <div class="col-12 mt-4">
        <div class="row">
            <div class="col-12 p-4" style="border-radius: 20px; background-color: #4e73df10">
                <h6><i class="fa fa-list pr-2"></i> Kelas</h6>
                <div class="table-responsive mt-4" style="color: #333">
                    <table class="table datatables dt-responsive" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th>Nama Kelas</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($kelas as $k) : ?>
                                <tr>
                                    <td><?= $k['nama_kelas'] ?></td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="<?= base_url('absen/laporanabsen/detail/'.$k['id_mst_kelas']) ?>">
                                            <i class="fa fa-list"></i>
                                        </a>
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