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
            <h1>List Barang</h1>
        </div>
    </div>


    <div class="search">
        <div>
            <form action="">
                <input type="text" placeholder="Search name, locate" class=" w-100">
            </form>
        </div>
    </div>

    <div class="bg-white">
        <div class="add">
            <a href="/barang/add" class="btn btn-outline-purple">Add Barang</a>
        </div>
        <table class="overflow-scroll w-100">
            <tr>
                <th>No.</th>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Locate</th>
                <th>Condition</th>
                <th>Action</th>
            </tr>
            <?php $no = 1; ?>
            <?php foreach($barang as $us): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $us['id']; ?></td>
                <td><img src="/images/product/<?= $us['photo']; ?>" alt="" width="120"></td>
                <td><a href="/barang/detail/<?= $us['id']; ?>" class="text-black"><?= $us['name']; ?></a></td>
                <td><?= $us['locate']; ?></td>
                <td><?= $us['kondisi']; ?></td>
                <td><a href="/barang/edit/<?= $us['id']; ?>" class="btn btn-outline-purple">Edit</a>
                    <form action="/barangcontroller/delete/<?= $us['id']; ?>" method="POST" class="d-inline">
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