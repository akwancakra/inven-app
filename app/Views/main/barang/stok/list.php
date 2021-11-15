<?= $this->extend('layouts/master'); ?>

<?= $this->section('style'); ?>
<style>
.title {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 15px 20px 25px 20px;
}

.add {
    padding: 30px 20px 20px 20px;
}
</style>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div>
    <div class="title">
        <a href="/barang" class="btn btn-purple">Go Back</a>
        <div>
            <p>Halaman</p>
            <h1>List Stok</h1>
        </div>
    </div>


    <div class="search">
        <div>
            <form action="">
                <input type="text" placeholder="Search name, email" class=" w-100">
            </form>
        </div>
    </div>

    <div class="bg-white">
        <!-- <div class="add">
            <a href="/user/add" class="btn btn-outline-purple">Add User</a>
        </div> -->
        <table class="overflow-scroll w-100">
            <tr>
                <th>No.</th>
                <th>ID</th>
                <th>Amount In</th>
                <th>Amount Out</th>
                <th>Total</th>
            </tr>
            <?php $no = 1; ?>
            <?php foreach($stok as $us): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $us['id_barang']; ?></td>
                <td><?= $us['amount_in']; ?></td>
                <td><?= $us['amount_out']; ?></td>
                <td><?= $us['total']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>