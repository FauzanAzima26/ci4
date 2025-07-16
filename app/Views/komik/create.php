<?= $this->extend('layout/tamplate'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Tambah Data Komik</h2>

            <?php $validation = session('validation'); ?>

            <form action="/komik/save" method="post" enctype="multipart/form-data">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                <div class="row mb-3">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text"
                            class="form-control <?= ($validation && $validation->hasError('judul')) ? 'is-invalid' : ''; ?>"
                            id="judul"
                            name="judul"
                            autofocus
                            value="<?= old('judul'); ?>">
                        <div class="invalid-feedback">
                            <?= ($validation) ? $validation->getError('judul') : '' ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                    <div class="col-sm-10">
                        <input type="text"
                            class="form-control <?= ($validation && $validation->hasError('penulis')) ? 'is-invalid' : ''; ?>"
                            id="penulis"
                            name="penulis"
                            value="<?= old('penulis'); ?>">
                        <div class="invalid-feedback">
                            <?= ($validation) ? $validation->getError('penulis') : '' ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                    <div class="col-sm-10">
                        <input type="text"
                            class="form-control <?= ($validation && $validation->hasError('penerbit')) ? 'is-invalid' : ''; ?>"
                            id="penerbit"
                            name="penerbit"
                            value="<?= old('penerbit'); ?>">
                        <div class="invalid-feedback">
                            <?= ($validation) ? $validation->getError('penerbit') : '' ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                    <div class="col-sm-10">
                        <label for="sampul" class="form-label">Pilih Gambar</label>
                        <input class="form-control <?= ($validation && $validation->hasError('sampul')) ? 'is-invalid' : ''; ?>"
                            type="file" id="sampul" name="sampul">
                        <div class="invalid-feedback">
                            <?= ($validation) ? $validation->getError('sampul') : '' ?>
                        </div>
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
                                value="<?= old('harga'); ?>">
                            <div class="invalid-feedback">
                                <?= ($validation) ? $validation->getError('harga') : '' ?>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>