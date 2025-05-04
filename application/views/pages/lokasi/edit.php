<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between my-4">
    <h1 class="h3 mb-0 text-gray-800"><?= isset($lokasi) ? 'Edit Lokasi' : 'Tambah Lokasi' ?></h1>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 style="font-weight: 500;" class="m-0 fs-5">Form Data</h6>
            </div>
            <div class="card-body p-3">
                <form action="<?= isset($lokasi) ? site_url('lokasi/update/' . $lokasi['id']) : site_url('lokasi/store') ?>" method="POST" class="needs-validation" novalidate>
                    <!-- Input Nama Lokasi -->
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input autocomplete="off" type="text" class="form-control" id="nama" name="nama"
                            value="<?= isset($lokasi) ? htmlspecialchars($lokasi['nama']) : '' ?>"
                            placeholder="Masukkan Nama Lokasi" required pattern="[A-Za-z\s]+">
                    </div>

                    <!-- Input Deskripsi -->
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea autocomplete="off" class="form-control" id="deskripsi" name="deskripsi" rows="3"
                            placeholder="Masukkan Deskripsi Lokasi" required pattern="[A-Za-z\s]+"><?= isset($lokasi) ? htmlspecialchars($lokasi['deskripsi']) : '' ?></textarea>
                    </div>

                    <div class="my-4">
                        <hr>
                    </div>

                    <!-- Tombol Simpan dan Batal -->
                    <div class="d-flex justify-content-end">
                        <a href="<?= base_url('lokasi') ?>" class="btn btn-danger">Batal</a>
                        <button type="submit" class="btn btn-primary ml-2">
                            <?= isset($lokasi) ? 'Update' : 'Simpan' ?>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>