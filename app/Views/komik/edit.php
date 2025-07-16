<?= $this->extend('layout/tamplate'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Ubah Data Komik</h2>

            <?php $validation = session('validation'); ?>

            <form action="/komik/update/<?= $komik['id']; ?>" method="post">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                <input type="hidden" name="slug" value="<?= $komik['slug']; ?>">

                <div class="row mb-3">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text"
                            class="form-control <?= ($validation && $validation->hasError('judul')) ? 'is-invalid' : ''; ?>"
                            id="judul"
                            name="judul"
                            autofocus
                            value="<?= (old('judul')) ? old('judul') : $komik['judul'] ?>">
                        <?php if ($validation && $validation->hasError('judul')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('judul'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                    <div class="col-sm-10">
                        <input type="text"
                            class="form-control <?= ($validation && $validation->hasError('penulis')) ? 'is-invalid' : ''; ?>"
                            id="penulis"
                            name="penulis"
                            value="<?= (old('penulis')) ? old('penulis') : $komik['penulis'] ?>">
                        <?php if ($validation && $validation->hasError('penulis')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('penulis'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                    <div class="col-sm-10">
                        <input type="text"
                            class="form-control <?= ($validation && $validation->hasError('penerbit')) ? 'is-invalid' : ''; ?>"
                            id="penerbit"
                            name="penerbit"
                            value="<?= (old('penerbit')) ? old('penerbit') : $komik['penerbit'] ?>">
                        <?php if ($validation && $validation->hasError('penerbit')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('penerbit'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                    <div class="col-sm-10">
                        <input type="text"
                            class="form-control <?= ($validation && $validation->hasError('sampul')) ? 'is-invalid' : ''; ?>"
                            id="sampul"
                            name="sampul"
                            value="<?= (old('sampul')) ? old('sampul') : $komik['sampul'] ?>">
                        <?php if ($validation && $validation->hasError('sampul')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('sampul'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number"
                                class="form-control <?= ($validation && $validation->hasError('harga')) ? 'is-invalid' : ''; ?>"
                                id="harga"
                                name="harga"
                                value="<?= (old('harga')) ? old('harga') : $komik['harga'] ?>">
                            <?php if ($validation && $validation->hasError('harga')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('harga'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>