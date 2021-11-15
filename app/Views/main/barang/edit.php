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
            <h1>Edit Barang</h1>
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
        <form action="/barang/barangedit/<?= $data['id']; ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" value="<?= $data['photo']; ?>" name="oldphoto">
            <div class="input-group">
                <label for="name">Name Barang</label>
                <input type="text" id="name" name="name" placeholder="Nama Barang..." value="<?= $data['name']; ?>">
            </div>
            <div class="input-group">
                <label for="details">Details Barang</label>
                <textarea rows="5" cols="189" name="details" class="d-block"
                    placeholder="Enter desc here..."><?= $data['details']; ?></textarea>
            </div>
            <div class="input-group">
                <label for="locate">Locate Barang</label>
                <input type="text" id="locate" name="locate" placeholder="Locate Barang..."
                    value="<?= $data['locate']; ?>">
            </div>
            <div class="input-group">
                <label for="locate">Locate Barang</label>
                <input type="text" id="locate" name="locate" placeholder="Locate Barang..."
                    value="<?= $data['locate']; ?>">
            </div>
            <div class="input-group">
                <label for="kondisi">Kondisi</label>
                <select name="kondisi" id="kondisi" class="d-block">
                    <option disabled selected hidden>Select Condition</option>
                    <option value="baru" <?= ($data['kondisi'] == 'baru' ? 'selected ': ''); ?>>Baru</option>
                    <option value="bekas" <?= ($data['kondisi'] == 'bekas' ? 'selected ': ''); ?>>Bekas</option>
                    <option value="cacat" <?= ($data['kondisi'] == 'cacat' ? 'selected ': ''); ?>>Cacat</option>
                    <option value="rusak" <?= ($data['kondisi'] == 'rusak' ? 'selected ': ''); ?>>Rusak</option>
                </select>
            </div>
            <div class="input-group">
                <label for="amount">Amount Barang</label>
                <input type="number" id="amount" name="amount" value="<?= $data['amount']; ?>">
            </div>
            <div class="input-group">
                <label for="source">Source Barang</label>
                <input type="text" id="source" name="source" placeholder="Source Barang..."
                    value="<?= $data['source']; ?>">
            </div>
            <div class="input-group">
                <label for="photo">Photo</label>
                <input type="file" id="photo" name="photo">
            </div>
            <img src="/images/product/<?= $data['photo']; ?>" alt="Product Image" width="120">

            <button type="submit" class="btn btn-outline-purple w-100">Edit</button>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>