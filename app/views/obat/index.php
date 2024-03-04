<div class="container mt-4">
    <div class="jumbotron">
        <h1 class="display-4">Selamat datang di website PHP MVC</h1>
        <p class="lead">Di website ini kamu bisa menambahkan, mengedit, dan menghapus data-data obat.</p>
    </div>

    <div class="mt-3 mb-5">
        <hr>
    </div>

    <div class="row">
        <div class="col-3">
            <div class="row">
                <div class="col-12 mb-3">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h5 class="card-title">Total Obat</h5>
                            <p class="card-text"><?= $data['totalObat'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="card bg-warning text-white">
                        <div class="card-body">
                            <h5 class="card-title">Obat dengan Stok Sedikit <em>(dibawah 10)</em></h5>
                            <p class="card-text"><?= $data['totalObatStokDibawah10'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="card bg-danger text-white">
                        <div class="card-body">
                            <h5 class="card-title">Obat Habis</h5>
                            <p class="card-text"><?= $data['totalObatStokNol'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-9 mb-5">
            <div class="row mb-3">
                <div class="col-md-8">
                    <h2 class="float-left">Data Obat</h2>
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-primary float-right mb-3" data-bs-toggle="modal" data-bs-target="#modalTambahObat">
                        + Tambah Obat
                    </button>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <table id="example" class="table">
                        <thead>
                            <tr>
                                <th>Nama Obat</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Stok</th>
                                <th class="text-center">Ditambahkan oleh</th>
                                <th class="text-center" data-sortable="false">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['obat'] as $row) : ?>
                                <tr>
                                    <td><?= $row['nama_obat'] ?></td>
                                    <td class="text-center"><?= $row['harga'] ?></td>
                                    <td class="text-center"><?= $row['stok'] ?></td>
                                    <td class="text-center"><?= $row['nama_user'] ?></td>
                                    <td class="text-center">
                                        <!-- Tombol Edit dan Hapus -->
                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalEditObat<?= $row['id_obat'] ?>"> <i class="bi bi-pencil-square mr-1"></i>Edit</button>
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapusObat<?= $row['id_obat'] ?>"><i class="bi bi-trash3 mr-1"></i>Hapus</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <!-- Tambahkan baris lainnya sesuai dengan data obat -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambahObat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalTambahObatLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="modalTambahObatLabel">Tambah Obat</h3>
            </div>
            <div class="modal-body">
                <!-- Vertical Form -->
                <form class="row g-3 mt-2" action="<?= BASEURL ?>/obat/tambah_obat" method="post">
                    <div class="col-12 mb-3">
                        <label class="form-label">Nama Obat</label>
                        <input type="text" name="nama_obat" class="form-control" required>
                    </div>
                    <div class="col-12 mb-3">
                        <label class="form-label">Harga Obat</label>
                        <input type="text" name="harga" class="form-control" required pattern="[0-9]*">
                    </div>
                    <div class="col-12 mb-3">
                        <label class="form-label">Stok Obat</label>
                        <input type="number" name="stok" min="0" class="form-control" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php foreach ($data['obat'] as $row) : ?>
    <!-- Modal Edit -->
    <div class="modal fade" id="modalEditObat<?= $row['id_obat'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalEditObatLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-5" id="modalEditObatLabel">Edit Obat</h3>
                </div>
                <div class="modal-body">
                    <!-- Vertical Form -->
                    <form class="row g-3 mt-2" action="<?= BASEURL ?>/obat/edit_obat" method="post">
                        <input type="hidden" value="<?= $row['id_obat'] ?>" name="id_obat">
                        <div class="col-12 mb-3">
                            <label class="form-label">Nama Obat</label>
                            <input type="text" name="nama_obat" value="<?= $row['nama_obat'] ?>" class="form-control" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Harga Obat</label>
                            <input type="text" name="harga" value="<?= $row['harga'] ?>" class="form-control" required pattern="[0-9]*">
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Stok Obat</label>
                            <input type="number" name="stok" min="0" value="<?= $row['stok'] ?>" class="form-control" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Hapus -->
    <div class="modal fade" id="modalHapusObat<?= $row['id_obat'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalHapusObatLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-5" id="modalHapusObatLabel">Hapus Obat</h3>
                </div>
                <div class="modal-body">
                    Apakah kamu yakin ingin menghapus ini?
                    <!-- Vertical Form -->
                    <form class="row g-3 mt-2" action="<?= BASEURL ?>/obat/hapus_obat" method="post">
                        <input type="hidden" value="<?= $row['id_obat'] ?>" name="id_obat">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                    <button type="submit" class="btn btn-primary">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>