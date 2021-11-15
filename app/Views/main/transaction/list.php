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
        <a href="/transaction" class="btn btn-purple">Go Back</a>
        <div>
            <p>Halaman</p>
            <h1>List Transactions</h1>
        </div>
    </div>


    <div class="search">
        <div>
            <form action="" method="">
                <input type="text" placeholder="Search name, email" class=" w-100">
            </form>
        </div>
    </div>

    <div class="bg-white">
        <table class="overflow-scroll w-100">
            <tr>
                <th>No.</th>
                <th>ID</th>
                <th>Name</th>
                <th>Amount</th>
                <th>Action</th>
            </tr>
            <?php $no = 1; ?>
            <?php foreach($transaction as $us): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $us['id']; ?></td>
                <td><a href="/transaction/detail/<?= $us['id']; ?>" class="text-black"><?= $us['name']; ?></a></td>
                <td><?= $us['amount']; ?></td>
                <td>
                    <form action="/transaction/delete/<?= $us['id']; ?>" method="POST" class="d-inline">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-outline-danger"
                            onclick="return confirm('Do you sure want to delete this?')">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>