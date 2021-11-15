<?= $this->extend('layouts/master'); ?>

<?= $this->section('link'); ?>
<link rel="stylesheet" href="css/main.css">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="title-main">
    <p>Halaman</p>
    <h1>Transaction Menu</h2>
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
                <a href="/transaction/list">
                    <i class='bx bx-notepad'></i>
                    <p class="content">LIST</p>
                </a>
            </div>
            <div class="card-box red-mix">
                <a href="/transaction/add">
                    <i class='bx bx-receipt'></i>
                    <p class="content">ADD</p>
                </a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>