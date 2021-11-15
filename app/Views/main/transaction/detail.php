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
        <a href="/transaction/list" class="btn btn-purple">Go Back</a>
        <div>
            <p>Halaman</p>
            <h1>Detail Transaction</h1>
        </div>
    </div>

    <div class="card-person bg-white p-5">
        <div class="body">
            <b>ID Barang </b>
            <p><?= $data['id_barang']; ?></p>
            <b>ID User </b>
            <p><?= $data['id_user']; ?></p>
            <b>Name Barang</b>
            <p><?= $data['name']; ?></p>
            <b>Amount Barang</b>
            <p><?= $data['amount']; ?></p>
            <b>Date In Barang</b>
            <p><?= $data['date_in']; ?></p>
            <b>Date Out Barang</b>
            <p><?= $data['date_out']; ?></p>
            <b>Condition Barang</b>
            <p><?= $data['kondisi']; ?></p>
        </div>
        <div class="footer">
            <a href="/transaction/edit/<?= $data['id']; ?>" class="btn btn-purple">Edit</a>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>