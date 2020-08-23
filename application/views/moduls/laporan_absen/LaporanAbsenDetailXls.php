<?php
    // $file="laporanabsen".date("Y/m/d His").".xls";

    // header("Content-type: application/vnd.ms-excel");
    // header("Content-Disposition: attachment; filename=$file");

?>
<table class="table datatables dt-responsive" border="1" style="border-collapse: collapse;">
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