<?= $this->extend('layout/tamplate'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Detail Komik</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/img/<?= $komik['sampul']; ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $komik['judul']; ?></h5>
                            <p class="card-text">
                                <small class="text-body-secondary">
                                    <b>Penulis:</b> <?= $komik['penulis']; ?>
                                </small>
                            </p>
                            <p class="card-text">
                                <small class="text-body-secondary">
                                    <b>Penerbit:</b> <?= $komik['penerbit']; ?>
                                </small>
                            </p>
                            <p class="card-text"><b>Harga:</b> Rp <?= number_format($komik['harga'], 0, ',', '.'); ?></p>

                            <a href="/komik/edit/<?= $komik['slug']; ?>" class="btn btn-warning">Edit</a>

                            <form action="/komik/<?= $komik['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm ('apakah anda yakin?')" ;>Delete</button>
                            </form>


                            <br><br>

                            <a href="/komik">Kembali ke daftar komik</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>