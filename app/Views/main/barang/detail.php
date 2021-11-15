<?= $this->extend('layouts/master'); ?>

<?= $this->section('style'); ?>
<style>
.title {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 15px 20px 25px 20px;
}

.card-person .body {
    margin: 15px 10px 15px 10px;
}
</style>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div>
    <div class="title">
        <a href="/barang/list" class="btn btn-purple">Go Back</a>
        <div>
            <p>Halaman</p>
            <h1>Detail Barang</h1>
        </div>
    </div>

    <div class="card-person bg-white p-5">
        <div>
            <img src="/images/product/<?= $data['photo']; ?>" class="rounded img-thumbnail" width="300">
        </div>
        <div class="body">
            <b><?= $data['name']; ?></b>
            <p><?= $data['details']; ?></p>
            <p><?= $data['locate']; ?></p>
        </div>
        <div class="footer">
            <a href="/barang/edit/<?= $data['id']; ?>" class="btn btn-purple">Edit</a>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>