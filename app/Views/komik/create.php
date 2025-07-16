<?= $this->extend('layout/tamplate'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Tambah Data Komik</h2>



            <form action="/komik/save" method="post" enctype="multipart/form-data">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                <div class="row mb-3">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text"
                            class="form-control <?= (validation_show_error('judul')) ? 'is-invalid' : ''; ?>"
                            id="judul"
                            name="judul"
                            autofocus
                            value="<?= old('judul'); ?>">
                        <div class="invalid-feedback">
                            <?= validation_show_error('judul') ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                    <div class="col-sm-10">
                        <input type="text"
                            class="form-control <?= (validation_show_error('penulis')) ? 'is-invalid' : ''; ?>"
                            id="penulis"
                            name="penulis"
                            value="<?= old('penulis'); ?>">
                        <div class="invalid-feedback">
                            <?= validation_show_error('penulis') ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                    <div class="col-sm-10">
                        <input type="text"
                            class="form-control <?= (validation_show_error('penerbit')) ? 'is-invalid' : ''; ?>"
                            id="penerbit"
                            name="penerbit"
                            value="<?= old('penerbit'); ?>">
                        <div class="invalid-feedback">
                            <?= validation_show_error('penerbit') ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>

                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input  <?= (validation_show_error('sampul')) ? 'is-invalid' : ''; ?>" id="sampul" name="sampul">
                            <label class="custom-file-label" for="sampul">Choose file</label>
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
                                value="<?= old('harga'); ?>">
                            <div class="invalid-feedback">
                                <?= validation_show_error('harga') ?>
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