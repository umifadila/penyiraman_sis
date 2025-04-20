<div class="container-fluid">
 <div class="row">
  <div class="col-12">
   <!-- Default box -->
   <div class="card">
    <div class="card-header">
     <h3 class="card-title">Kelola Data Sepeda</h3>
     <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
       <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
       <i class="fas fa-times"></i>
      </button>
     </div>
    </div>
    <div class="card-body">
     <?php if (!empty($this->session->flashdata('success'))) { ?>
      <div class="alert alert-success" role="alert">
       <?= $this->session->flashdata('success');  ?>
      </div>
     <?php } ?>
     <div class="row mb-4">
      <div class="col-12">
       <a href="<?= site_url("sepeda/tambah") ?>" class="btn btn-primary">Tambah Data <i class="fa-sharp fa-solid fa-plus"></i></a>
      </div>
     </div>
     <div class="table-responsive">
      <table id="example" class="display" style="width:100%">
       <thead>
        <tr>
         <th>No</th>
         <th>Merek Sepeda</th>
         <th>Spesifikasi</th>
         <th>Harga</th>
         <th>Gambar</th>
         <th>Aksi</th>
        </tr>
       </thead>
       <tbody>
        <?php
        $no = 1;
        foreach ($sepeda as $key) { ?>
         <tr>
          <td style="width: 2%;"><?= $no; ?></td>
          <td style="width: 18%;"><?= $key->merk_sepeda; ?></td>
          <td style="width: 30%;"><?= $key->spesifikasi; ?></td>
          <td style="width: 15%;">Rp.<?= number_format($key->harga); ?></td>
          <td style="width: 25%;"><img class="img-fluid" src="<?= site_url("upload/$key->gambar") ?>" alt=""></td>
          <td style="width: 10%;">
           <a href="<?= site_url("sepeda/ubah/$key->id_sepeda") ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-nib"></i></a>
           <a href="<?= base_url("sepeda/hapus/$key->id_sepeda") ?>" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
          </td>
         </tr>
        <?php
         $no++;
        } ?>
       </tbody>
      </table>
     </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">

    </div>
    <!-- /.card-footer-->
   </div>
   <!-- /.card -->
  </div>
 </div>
</div>