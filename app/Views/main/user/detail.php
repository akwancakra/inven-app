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
        <a href="/user/list" class="btn btn-purple">Go Back</a>
        <div>
            <p>Halaman</p>
            <h1>Detail User</h1>
        </div>
    </div>

    <div class="card-person bg-white rounded p-5">
        <div>
            <img src="/images/avatar/<?= $data['avatar']; ?>" width="300" class="rounded img-thumbnail">
        </div>
        <div class="body">
            <p><?= $data['name']; ?></p>
            <p><?= $data['email']; ?></p>
            <p><?= $data['level']; ?></p>
        </div>
        <div class="footer">
            <a href="/user/edit/<?= $data['id']; ?>" class="btn btn-purple">Edit</a>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>