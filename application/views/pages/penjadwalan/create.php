<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between my-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Penjadwalan</h1>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 style="font-weight: 500;" class="m-0 fs-5">Form Penjadwalan</h6>
            </div>
            <div class="card-body p-3">
                <form action="<?= site_url('penjadwalan/store') ?>" method="POST" class="needs-validation" novalidate>
                    <!-- Input Lokasi -->
                    <div class="form-group">
                        <label for="lokasi_id">Lokasi</label>
                        <select class="form-control" id="lokasi_id" name="lokasi_id" required>
                            <option value="">Pilih Lokasi</option>
                            <?php foreach ($lokasi as $lokasi_item): ?>
                                <option value="<?= $lokasi_item['id'] ?>"><?= $lokasi_item['nama'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <!-- Input Type -->
                    <div class="form-group">
                        <label for="type">Tipe</label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="">Pilih Tipe</option>
                            <option value="penyiraman">Penyiraman</option>
                            <option value="pemupukan">Pemupukan</option>
                        </select>
                    </div>

                    <!-- Input Hari -->
                    <div class="form-group">
                        <label for="hari">Hari</label>
                        <select class="form-control" name="hari" required>
                            <?php foreach (['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'] as $day): ?>
                                <option value="<?= $day ?>"><?= $day ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <!-- Input Tanggal -->
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>

                    <!-- Input Waktu -->
                    <div class="form-group">
                        <label for="waktu">Waktu</label>
                        <input type="time" class="form-control" id="waktu" name="waktu" required>
                    </div>

                    <!-- Input Status -->
                    <div class="form-group">
                        <label for="is_aktif">Status</label>
                        <select class="form-control" id="is_aktif" name="is_aktif" required>
                            <option value="aktif">Aktif</option>
                            <option value="non-aktif">Non-Aktif</option>
                        </select>
                    </div>

                    <!-- Input Keterangan -->
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Masukkan Keterangan" required></textarea>
                    </div>

                    <div class="my-4">
                        <hr>
                    </div>
                    <!-- Tombol Simpan -->
                    <div class="d-flex justify-content-end">
                        <a href="<?= base_url('penjadwalan') ?>" class="btn btn-danger">Batal</a>
                        <button type="submit" class="btn btn-primary ml-2">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
