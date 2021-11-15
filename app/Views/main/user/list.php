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
        <a href="/user" class="btn btn-purple">Go Back</a>
        <div>
            <p>Halaman</p>
            <h1>List User</h1>
        </div>
    </div>


    <div class="search">
        <div>
            <form action="/usercontroller/list" method="GET">
                <input type="text" placeholder="Search name, email" class=" w-100" name="keyword">
                <button value="submit"></button>
            </form>
        </div>
    </div>

    <div class="bg-white">
        <div class="add">
            <a href="/user/add" class="btn btn-outline-purple">Add User</a>
        </div>
        <table class="overflow-scroll w-100">
            <tr>
                <th>No.</th>
                <th>ID</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Level</th>
                <th>Action</th>
            </tr>
            <?php $i = count($user) * $currentPage - (count($user) - 1); ?>
            <?php foreach($user as $us): ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $us['id']; ?></td>
                <td><a href="/user/detail/<?= $us['id']; ?>" class="text-black"><?= $us['name']; ?></a></td>
                <td><?= $us['email']; ?></td>
                <td><?= $us['level']; ?></td>
                <td><a href="/user/edit/<?= $us['id']; ?>" class="btn btn-outline-purple">Edit</a>
                    <form action="/usercontroller/delete/<?= $us['id']; ?>" method="POST" class="d-inline">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-outline-danger"
                            onclick="return confirm('Do you sure want to delete this?')">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>

        <?= $pager->links('user', 'custom_pagination'); ?>
    </div>
</div>
<?= $this->endSection(); ?>