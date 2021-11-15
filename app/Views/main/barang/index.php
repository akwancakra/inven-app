<?= $this->extend('layouts/master'); ?>

<?= $this->section('link'); ?>
<link rel="stylesheet" href="css/main.css">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="title-main">
    <p>Halaman</p>
    <h1>Barang Menu</h2>
</div>

<?php if(session()->getFlashData('success')): ?>
<div class="alert-purple">
    <?= session()->getFlashData('success'); ?>
</div>
<?php endif; ?>
<?php if(session()->getFlashData('error')): ?>
<div class="alert-danger">
    <?= session()->getFlashData('error'); ?>
</div>
<?php endif; ?>

<div class="boxed">
    <div class="menu">
        <div class="tree-card-box">
            <div class="card-box blue-mix">
                <a href="/barang/list/in">
                    <i class='bx bx-archive-in'></i>
                    <p class="content">IN</p>
                </a>
            </div>
            <div class="card-box green-mix">
                <a href="/barang/list">
                    <i class='bx bx-box'></i>
                    <p class="content">BARANG</p>
                </a>
            </div>
            <div class="card-box purple-mix">
                <a href="/barang/stok">
                    <i class='bx bx-archive'></i>
                    <p class="content">STOCK</p>
                </a>
            </div>
            <div class="card-box red-mix">
                <a href="/barang/list/out">
                    <i class='bx bx-archive-out'></i>
                    <p class="content">OUT</p>
                </a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>