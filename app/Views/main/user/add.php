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
            <h1>Add User</h1>
        </div>
    </div>

    <div class="bg-white form-main">
        <?php if(session()->getFlashData('error')): ?>
        <div class="alert-danger">
            <?php foreach(session()->getFlashData('error') as $error): ?>
            <div class="flex">
                <?= $error; ?>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <h1>Add User Form</h1><br>
        <form action="/user/adduser" method="POST">
            <?= csrf_field(); ?>
            <div class="input-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Name...">
            </div>
            <div class="input-group">
                <label for="email">E-mail</label>
                <input type="text" id="email" name="email" placeholder="E-mail...">
            </div>
            <div class="input-group">
                <label for="level">Level</label>
                <select name="level" id="level">
                    <option disabled selected hidden>Select Level</option>
                    <option value="administrator">Administrator</option>
                    <option value="operator">Operator</option>
                    <option value="peminjam">Peminjam</option>
                </select>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="text" id="password" name="password" placeholder="Password...">
            </div><br>
            <button type="submit" class="btn btn-outline-purple w-100">Submit</button>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>