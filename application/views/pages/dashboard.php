<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between my-4">
  <h1 class="h3 mb-0" style="color: #26A69A;">Dashboard</h1>
  <span class="badge badge-primary" style="background-color: #26A69A;">Real Time</span>
</div>

<!-- Ringkasan Kartu -->
<div class="row">

  <!-- Jumlah Lokasi -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Lokasi</div>
        <div id="jml_lokasi" class="h5 mb-0 font-weight-bold text-gray-800">Loading...</div>
      </div>
    </div>
  </div>

  <!-- Penyiraman Hari Ini -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Penyiraman Hari Ini</div>
        <div id="penyiraman_today" class="h5 mb-0 font-weight-bold text-gray-800">Loading...</div>
      </div>
    </div>
  </div>

  <!-- Pemupukan Hari Ini -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
      <div class="card-body">
        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pemupukan Hari Ini</div>
        <div id="pemupukan_today" class="h5 mb-0 font-weight-bold text-gray-800">Loading...</div>
      </div>
    </div>
  </div>

  <!-- Jadwal Aktif -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jadwal Aktif</div>
        <div id="jadwal_aktif" class="h5 mb-0 font-weight-bold text-gray-800">Loading...</div>
      </div>
    </div>
  </div>

</div>

<!-- Row: Log Aksi & Kelembaban -->
<div class="row">

  <!-- Log Aksi Terakhir -->
  <div class="col-md-6 mb-4">
    <div class="card shadow">
      <div style="background-color: #26A69A;" class="card-header text-white font-weight-bold">
        <i class="fas fa-history"></i> Log Aksi Terakhir
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-bordered table-sm mb-0">
            <thead style="color: #26A69A">
              <tr>
                <th class="text-center">Lokasi ID</th>
                <th class="text-center">Jenis Aksi</th>
                <th class="text-center">Sumber</th>
                <th class="text-center">Waktu</th>
              </tr>
            </thead>
            <tbody id="log_aksi_tbody">
              <tr><td colspan="4" class="text-center">Loading...</td></tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Kelembaban Tanah Terbaru -->
<div class="col-md-6 mb-4">
  <div class="card shadow">
    <div style="background-color: #26A69A;" class="card-header text-white font-weight-bold">
      <i class="fas fa-tint"></i> Kelembaban Terbaru per Lokasi
    </div>
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-bordered table-sm mb-0">
          <thead style="color: #26A69A">
            <tr>
              <th class="text-center">Lokasi ID</th>
              <th class="text-center">Kelembaban (%)</th>
              <th class="text-center">Waktu</th>
            </tr>
          </thead>
          <tbody id="soil_recent_tbody">
            <tr><td colspan="3" class="text-center">Loading...</td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

</div>

<!-- Jadwal Mendatang -->
<div class="row mb-4">
  <div class="col-12">
    <div class="card shadow">
      <div style="background-color: #26A69A;" class="card-header text-white font-weight-bold">
        <i class="fas fa-calendar-alt"></i> Jadwal Mendatang
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-bordered table-sm mb-0">
          <thead style="color: #26A69A">
              <tr>
                <th class="text-center">Lokasi ID</th>
                <th class="text-center">Jenis</th>
                <th class="text-center">Hari</th>
                <th class="text-center">Tanggal</th>
                <th class="text-center">Waktu</th>
                <th class="text-center">Status</th>
              </tr>
            </thead>
            <tbody id="jadwal_mendatang_tbody">
              <tr><td colspan="6" class="text-center">Loading...</td></tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>