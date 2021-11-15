<?= $this->extend('layouts/master'); ?>

<?= $this->section('style'); ?>
<style>
.title {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 15px 20px 25px 20px;
}

.form-main {
    padding: 20px;
}

.input-group {
    margin-bottom: 15px;
}

.input-group input {
    width: 100%;
    margin-top: 5px;
    padding: 10px;
    border-radius: 10px;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    -ms-border-radius: 10px;
    -o-border-radius: 10px;
}

button {
    font-size: 18px;
}
</style>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div>
    <div class="title">
        <a href="/user" class="btn btn-purple">Go Back</a>
        <div>
            <p>Halaman</p>
            <h1>Edit User</h1>
        </div>
    </div>

    <div class="bg-white form-main">
        <?= session()->getFlashData('error'); ?>
        <?php if(session()->getFlashData('error')): ?>
        <div class="alert-danger">
            <?php foreach(session()->getFlashData('error') as $error): ?>
            <div class="flex">
                <?= $error; ?>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <h1>Edit Form</h1><br>
        <form action="/user/edituser" method="POST">
            <?= csrf_field(); ?>
            <input type="hidden" value="<?= $data['id']; ?>" name="id">
            <div class="input-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Name..." value="<?= $data['name']; ?>">
            </div>
            <div class="input-group">
                <label for="email">E-mail</label>
                <input type="text" id="email" name="email" placeholder="E-mail..." value="<?= $data['email']; ?>">
            </div>
            <div class="input-group">
                <label for="level">Level</label>
                <select name="level" id="level">
                    <option <?= ($data['level'] == 'administrator' ? 'selected ': ''); ?>value="administrator">
                        Administrator</option>
                    <option <?= ($data['level'] == 'operator' ? 'selected ': ''); ?>value="operator">Operator
                    </option>
                    <option <?= ($data['level'] == 'peminjam' ? 'selected ': ''); ?>value="peminjam">Peminjam
                    </option>
                </select>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password...">
            </div><br>
            <button type="submit" class="btn btn-outline-purple w-100">Edit</button>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>