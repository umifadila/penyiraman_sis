<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between my-4">
  <h1 class="h3 mb-0" style="color: #2E8B57;">Lokasi</h1>

  <a href="<?= base_url('lokasi/create'); ?>" class="m-0 d-none d-sm-inline-block btn btn-sm shadow-sm"
    style="background-color: #2E8B57; color: #fff;">
    <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data
  </a>
</div>

<!-- Content Row -->
<div class="row">
  <div class="col-12">
    <div class="card shadow mb-4" style="border: 1px solid #A9DFBF;">
      <div class="card-header py-3" style="background-color: #A9DFBF;">
        <h6 class="m-0 fs-5" style="font-weight: 600; color: #2E8B57;">Tabel Data</h6>
      </div>
      <div class="card-body p-3" style="background-color: #F0F0F0;">
        <div class="table-responsive">
          <table style="font-size: 0.9rem;" class="table table-bordered" id="dataTableLokasi" width="100%" cellspacing="0">
            <thead>
              <tr style="background-color: #DFF5E3;">
                <th class="text-center" style="width: 5%; font-weight: 600; color: #2E8B57;">NO</th>
                <th class="text-center" style="width: 25%; font-weight: 600; color: #2E8B57;">Nama Lokasi</th>
                <th class="text-center" style="width: 20%; font-weight: 600; color: #2E8B57;">Jona</th>
                <th class="text-center" style="width: 50%; font-weight: 600; color: #2E8B57;">Deskripsi</th>
                <th class="text-center" style="width: 15%; font-weight: 600; color: #2E8B57;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($lokasi as $row): ?>
                <tr style="background-color: #ffffff;">
                  <td class="text-center" style="vertical-align: middle; text-transform: capitalize;"><?= $no++ ?></td>
                  <td style="vertical-align: middle; text-transform: capitalize;"><?= htmlspecialchars($row['nama']) ?></td>
                  <td class="text-center" style="vertical-align: middle;"><?= htmlspecialchars($row['jona']) ?></td>
                  <td style="text-align: justify; vertical-align: middle; text-transform: capitalize;"><?= htmlspecialchars($row['deskripsi']) ?></td>
                  <td class="text-center d-flex justify-content-center" style="vertical-align: middle;">
                    <a href="<?= site_url('lokasi/edit/' . $row['id']) ?>" class="btn btn-sm btn-warning">
                      <i class="fas fa-pencil-alt"></i>
                    </a>
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
