<?= $this->extend('layouts/master'); ?>

<?= $this->section('link'); ?>
<link rel="stylesheet" href="css/main.css">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div>
    <div class="ml-5">
        <h2>Hello, <span class="text-purple"><?= session()->name; ?></span></h2>
    </div>

    <div class="tree-card">
        <div class="card red-mix">
            <p class="title">Transactions</p>
            <p class="content">12</p>
        </div>
        <div class="card blue-mix">
            <p class="title">Stuffs</p>
            <p class="content"><?= $barang; ?></p>
        </div>
        <div class="card green-mix">
            <p class="title">Customer</p>
            <p class="content"><?= $user; ?></p>
        </div>
        <div class="card purple-mix">
            <p class="title">Operator</p>
            <p class="content">32</p>
        </div>
    </div>

    <div class="transaction">
        <div>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>