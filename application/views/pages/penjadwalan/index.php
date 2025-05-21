<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between my-4">
  <h1 class="h3 mb-0" style="color: #2E8B57;">Penjadwalan</h1>
  <a href="<?= base_url('penjadwalan/create'); ?>" class="m-0 d-none d-sm-inline-block btn btn-sm shadow-sm"
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
          <table style="font-size: 0.9rem;" class="table table-bordered" id="dataTablepenjadwalan" width="100%" cellspacing="0">
            <thead>
             <tr style="background-color: #DFF5E3;">
              <th class="text-center" style="width: 5%; font-weight: 600; color: #2E8B57;">NO</th>
              <th class="text-center" style="width: 10%; font-weight: 600; color: #2E8B57;">Lokasi</th>
              <th class="text-center" style="width: 12%; font-weight: 600; color: #2E8B57;">Jenis Jadwal</th>
              <th class="text-center" style="width: 10%; font-weight: 600; color: #2E8B57;">Hari</th>
              <th class="text-center" style="width: 13%; font-weight: 600; color: #2E8B57;">Tanggal</th>
              <th class="text-center" style="width: 10%; font-weight: 600; color: #2E8B57;">Waktu</th>
              <th class="text-center" style="width: 10%; font-weight: 600; color: #2E8B57;">Aktif</th>
              <th class="text-center" style="width: 20%; font-weight: 600; color: #2E8B57;">Keterangan</th>
              <th class="text-center" style="width: 10%; font-weight: 600; color: #2E8B57;">Aksi</th>
            </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($penjadwalan as $row): ?>
                <tr style="background-color: #ffffff;">
                  <td class="text-center" style="vertical-align: middle;"><?= $no++ ?></td>
                  <td class="text-center" style="vertical-align: middle;"><?= htmlspecialchars($row['nama_lokasi']) ?></td>
                  <td class="text-center" style="vertical-align: middle;"><?= htmlspecialchars($row['type']) ?></td>
                  <td class="text-center" style="vertical-align: middle;"><?= htmlspecialchars($row['hari']) ?></td>
                  <td class="text-center" style="vertical-align: middle;"><?= htmlspecialchars($row['tanggal']) ?></td>
                  <td class="text-center" style="vertical-align: middle;"><?= htmlspecialchars($row['waktu']) ?></td>
                  <td class="text-center" style="vertical-align: middle;"><?= $row['is_aktif'] == 1 ? 'Aktif' : 'Nonaktif' ?></td>
                  <td style="text-align: justify; vertical-align: middle;"><?= htmlspecialchars($row['keterangan']) ?></td>
                  <td class="text-center d-flex justify-content-center" style="vertical-align: middle;">
                    <a href="<?= site_url('penjadwalan/edit/' . $row['id']) ?>" class="btn btn-sm btn-warning">
                      <i class="fas fa-pencil-alt"></i>
                    </a>
                    <a href="<?= site_url('penjadwalan/delete/' . $row['id']) ?>" class="btn btn-sm btn-danger ml-2">
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

<!-- Tambahkan Script DataTables -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css" />

<script>
  $(document).ready(function () {
    $('#dataTablepenjadwalan').DataTable({
      language: {
        search: "",
        searchPlaceholder: "Cari Penjadwalan...",
        lengthMenu: "Tampilkan _MENU_ entri",
        info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
        paginate: {
          previous: "Previous",
          next: "Next"
        },
        zeroRecords: "Data tidak ditemukan"
      }
    });
  });
</script>
