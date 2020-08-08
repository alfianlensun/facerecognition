<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fa fa-grin-alt"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Absensi</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="<?= base_url('mainmenu') ?>">
    <i class="fas fa-fw fa-th-large"></i>
    <span>Menu Utama</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Fitur
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-cog"></i>
    <span>Pengaturan Pengguna</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Pengaturan Pengguna</h6>
        <a class="collapse-item" href="<?= base_url('user-management/mahasiswa') ?>">Mahasiswa</a>
        <a class="collapse-item" href="<?= base_url('user-management/dosen') ?>">Dosen</a>
    </div>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link" href="<?= base_url('Jadwal') ?>">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Pengaturan Jadwal</span></a>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#navMaster" aria-expanded="true" aria-controls="navMaster">
    <i class="fas fa-fw fa-cog"></i>
    <span>Data Master</span>
    </a>
    <div id="navMaster" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Data Master</h6>
        <a class="collapse-item" href="<?= base_url('master/kelas') ?>">Kelas</a>
        <a class="collapse-item" href="<?= base_url('master/mata-kuliah') ?>">Mata Kuliah</a>
        <a class="collapse-item" href="<?= base_url('master/semester') ?>">Semester</a>
    </div>
    </div>
</li>
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">
