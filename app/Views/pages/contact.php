<?= $this->extend('layout/tamplate'); ?>

<?= $this->section('content'); ?>
<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h2>Contact Us</h2>

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th></th>
                        <th>Alamat</th>
                        <th>Kota</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($alamat as $a): ?>
                        <tr>
                            <td><?= $a['tipe']; ?></td>
                            <td><?= $a['alamat']; ?></td>
                            <td><?= $a['kota']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>