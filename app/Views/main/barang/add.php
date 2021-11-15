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
        <a href="/barang" class="btn btn-purple">Go Back</a>
        <div>
            <p>Halaman</p>
            <h1>Add Barang</h1>
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

        <?php if(session()->getFlashData('error')): ?>
        <div class="alert-danger">
            <?= session()->getFlashData('error'); ?>
        </div>
        <?php endif; ?>

        <h1>Add Barang Form</h1><br>
        <form action="/barang/barangpost" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="input-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Name..." value="<?= old('name'); ?>">
            </div>
            <div class="input-group">
                <label for="locate">locate</label>
                <input type="text" id="locate" name="locate" placeholder="locate..." value="<?= old('locate'); ?>">
            </div>
            <div class="input-group">
                <label for="details">details</label>
                <textarea rows="5" cols="189" name="details" class="d-block"
                    placeholder="Enter desc here..."><?= old('details'); ?></textarea>
            </div>
            <div class="input-group">
                <label for="kondisi">Kondisi</label>
                <select name="kondisi" id="kondisi" class="d-block">
                    <option disabled selected hidden>Select Level</option>
                    <option value="baru">Baru</option>
                    <option value="bekas">Bekas</option>
                    <option value="cacat">Cacat</option>
                    <option value="rusak">Rusak</option>
                </select>
            </div>
            <div class="input-group">
                <label for="amount">Amount</label>
                <input type="number" id="amount" name="amount" placeholder="amount..." value="<?= old('amount'); ?>">
            </div>
            <div class="input-group">
                <label for="source">Source</label>
                <input type="text" id="source" name="source" placeholder="source..." value="<?= old('source'); ?>">
            </div>
            <div class="input-group">
                <label for="photo">Photo</label>
                <input type="file" id="photo" name="photo">
            </div>
            <button type="submit" class="btn btn-outline-purple w-100">Submit</button>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>