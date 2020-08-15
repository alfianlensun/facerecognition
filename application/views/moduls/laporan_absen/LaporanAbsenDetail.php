<div class="row p-4">
    <div class="col-12 mt-4">
        <div class="row">
            <div class="col-12 p-4" style="border-radius: 20px; background-color: #4e73df10">
                
                <form class="row" method="post" action="<?= base_url('absen/laporanabsen/detail/7') ?>">
                    <div class="col">
                    <h6><i class="fa fa-list pr-2"></i> Kelas</h6>
                    </div>
                    <div class="col-3">
                        <input type="date" name="date" value="<?= $this->input->post('date') ? $this->input->post('date') : date('Y-m-d') ?>" class="form-control" >
                    </div>
                    <div class="col-1">
                        <button class="btn btn-primary btn-block">Cari <i class="fa fa-search"></i></button>
                    </div>
                </form>
                <div class="table-responsive mt-4" style="color: #333">
                
                    <table class="table datatables dt-responsive" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th>Nama Mahasiswa</th>
                                <th>Mata Kuliah</th>
                                <th>Tanggal / Jam Absensi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($absenDetail as $k) : ?>
                                <tr>
                                    <td><?= $k['nama_mahasiswa'] ?></td>
                                    <td><?= $k['nama_mata_kuliah'] ?></td>
                                    <td><?= date('d-m-Y / H:i:s',strtotime($k['jam_absen'])) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
</div>