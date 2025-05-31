<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between my-4">
  <h1 class="h3 mb-0" style="color: #26A69A;">Lokasi</h1>
  <a style="background-color: #ffffff; color: #26A69A;"  href="<?= base_url('penjadwalan/create'); ?>" class="m-0 d-none d-sm-inline-block btn btn-sm shadow-sm">
    <i class="fas fa-plus fa-sm"></i> Tambah Data
  </a>
</div>

<!-- Content Row -->
<div class="row">
  <div class="col-12">
    <div class="card shadow mb-4" style="border: 1px solidrgb(255, 255, 255);">
      <div class="card-header py-3" style="background-color:rgb(255, 255, 255);">
        <h6 class="m-0 fs-5" style="font-weight: 600; color: #26A69A">Tabel Data</h6>
      </div>
      <div class="card-body p-3" style="background-color:rgb(255, 255, 255);">
        <div class="table-responsive">
          <table style="font-size: 0.9rem;" class="table table-bordered" id="dataTablepenjadwalan" width="100%" cellspacing="0">
            <thead>
             <tr style="background-color:rgb(255, 255, 255);">
              <th class="text-center" style="width: 5%; font-weight: 600; color: #26A69A;">NO</th>
              <th class="text-center" style="width: 10%; font-weight: 600; color: #26A69A;">Lokasi</th>
              <th class="text-center" style="width: 12%; font-weight: 600; color: #26A69A;">Jenis Jadwal</th>
              <th class="text-center" style="width: 10%; font-weight: 600; color: #26A69A;">Hari</th>
              <th class="text-center" style="width: 13%; font-weight: 600; color: #26A69A;">Tanggal</th>
              <th class="text-center" style="width: 10%; font-weight: 600; color: #26A69A;">Waktu</th>
              <th class="text-center" style="width: 10%; font-weight: 600; color: #26A69A;">Aktif</th>
              <th class="text-center" style="width: 20%; font-weight: 600; color: #26A69A;">Keterangan</th>
              <th class="text-center" style="width: 10%; font-weight: 600; color: #26A69A;">Aksi</th>
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
                    <a href="<?= site_url('penjadwalan/edit/' . $row['id']) ?>" class="btn btn-sm btn-warning" style="background-color: #FFC107; border-color: #FFC107" data-id="<?= $row['id'] ?>">
                      <i class="fas fa-pencil-alt"></i>
                    </a>
                    <a href="<?= site_url('penjadwalan/delete/' . $row['id']) ?>" class="btn btn-sm btn-danger ml-2" style="background-color: #FF5252; border-color:rgb(255, 164, 164);" data-id="<?= $row['id'] ?>">
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
