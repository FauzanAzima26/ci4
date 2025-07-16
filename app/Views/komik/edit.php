<?= $this->extend('layout/tamplate'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Ubah Data Komik</h2>

            <form action="/komik/update/<?= $komik['id']; ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                <input type="hidden" name="slug" value="<?= $komik['slug']; ?>">
                <input type="hidden" name="sampulLama" value="<?= $komik['sampul']; ?>">

                <div class="row mb-3">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text"
                            class="form-control <?= (validation_show_error('judul')) ? 'is-invalid' : ''; ?>"
                            id="judul"
                            name="judul"
                            autofocus
                            value="<?= (old('judul')) ? old('judul') : $komik['judul'] ?>">
                        <?php if (validation_show_error('judul')) : ?>
                            <div class="invalid-feedback">
                                <?= validation_show_error('judul'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                    <div class="col-sm-10">
                        <input type="text"
                            class="form-control <?= (validation_show_error('penulis')) ? 'is-invalid' : ''; ?>"
                            id="penulis"
                            name="penulis"
                            value="<?= (old('penulis')) ? old('penulis') : $komik['penulis'] ?>">
                        <?php if (validation_show_error('penulis')) : ?>
                            <div class="invalid-feedback">
                                <?= validation_show_error('penulis'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                    <div class="col-sm-10">
                        <input type="text"
                            class="form-control <?= (validation_show_error('penerbit')) ? 'is-invalid' : ''; ?>"
                            id="penerbit"
                            name="penerbit"
                            value="<?= (old('penerbit')) ? old('penerbit') : $komik['penerbit'] ?>">
                        <?php if (validation_show_error('penerbit')) : ?>
                            <div class="invalid-feedback">
                                <?= validation_show_error('penerbit'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                    <div class="col-sm-2">
                        <img src="/img/<?= $komik['sampul'] ?>" class="img-thumbnail img-preview">
                    </div>

                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input  <?= (validation_show_error('sampul')) ? 'is-invalid' : ''; ?>" id="sampul" name="sampul" onchange="previewImg()">
                            <label class="custom-file-label" for="sampul"><?= $komik['sampul'] ?></label>
                        </div>
                        <div class="invalid-feedback" style="display: block !important; color: red;">
                            <?= validation_show_error('sampul') ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number"
                                class="form-control <?= (validation_show_error('harga')) ? 'is-invalid' : ''; ?>"
                                id="harga"
                                name="harga"
                                value="<?= (old('harga')) ? old('harga') : $komik['harga'] ?>">
                            <?php if (validation_show_error('harga')) : ?>
                                <div class="invalid-feedback">
                                    <?= validation_show_error('harga'); ?>
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