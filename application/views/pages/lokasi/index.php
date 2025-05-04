  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between my-4">
      <h1 class="h3 mb-0 text-gray-800">Lokasi</h1>
      <a href="<?= base_url('lokasi/create'); ?>" class="m-0 d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
          <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data
      </a>
  </div>

  <!-- Content Row -->
  <div class="row">
      <div class="col-12">
          <div class="card shadow mb-4">
              <div class="card-header py-3">
                  <h6 style="font-weight: 500;" class="m-0 fs-5">Tabel Data</h6>
              </div>
              <div class=" card-body p-3">
                  <div class="table-responsive">
                      <table style="font-size: 0.9rem;" class="table table-bordered" id="dataTableLokasi" width="100%" cellspacing="0">
                          <thead style="border-bottom: none;">
                              <tr>
                                  <th class="text-center" style="width: 5%; border-top: none; border-bottom: none; font-weight: 500;">NO</th>
                                  <th class="text-center" style="width: 25%; border-top: none; border-bottom: none; font-weight: 500;">Nama Lokasi</th>
                                  <th class="text-center" style="width: 20%; border-top: none; border-bottom: none; font-weight: 500;">Jona</th>
                                  <th class="text-center" style="width: 50%; border-top: none; border-bottom: none; font-weight: 500;">Deskripsi</th>
                                  <th class="text-center" style="width: 15%; border-top: none; border-bottom: none; font-weight: 500;">Aksi</th> <!-- Kolom aksi -->
                              </tr>
                          </thead>
                          <tbody>
                              <?php $no = 1;
                                foreach ($lokasi as $row): ?>
                                  <tr>
                                      <td style="vertical-align: middle;  text-transform: capitalize;" class="text-center"><?= $no++ ?></td>
                                      <td style="vertical-align: middle;  text-transform: capitalize;"><?= htmlspecialchars($row['nama']) ?></td>
                                      <td style="vertical-align: middle;" class="text-center"><?= htmlspecialchars($row['jona']) ?></td>
                                      <td style="text-align: justify; vertical-align: middle;  text-transform: capitalize;"><?= htmlspecialchars($row['deskripsi']) ?></td>
                                      <td style="vertical-align: middle;" class="text-center d-flex">
                                          <!-- Tombol Edit -->
                                          <a href="<?= site_url('lokasi/edit/' . $row['id']) ?>" class="btn btn-sm btn-warning">
                                              <i class="fas fa-pencil-alt"></i> <!-- Ikon pencil -->
                                          </a>
                                          <!-- Tombol Hapus -->
                                          <a href="#" class="btn-delete-lokasi btn btn-sm btn-danger ml-2 btn-delete" data-id="<?= $row['id'] ?>">
                                              <i class="fas fa-trash"></i>
                                          </a>
                                      </td>
                                  </tr>
                              <?php endforeach ?>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
  </div>