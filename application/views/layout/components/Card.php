<div  style="cursor:pointer; width: 100%" onclick="return window.location = '<?= base_url('user-management') ?>'">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
            <div class=" text-primary text-uppercase mb-1"><?= $title ?></div>
            <div class="h5 mb-0 text-xs text-black-01" style="line-height: 20px"><?= $detail ?></div>
            </div>
            <div class="col-auto">
            <i class="fas fa-<?= $icon ?> fa-2x text-primary"></i>
            </div>
        </div>
        </div>
    </div>
</div>