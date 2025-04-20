<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Default box -->
            <form enctype="multipart/form-data" action="<?= site_url("sepeda/simpanUbah") ?>" method="post">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Ubah Data Sepeda</h3>
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
                        <?php if (!empty(validation_errors())) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?= validation_errors(); ?>
                            </div>
                        <?php } ?>
                        <div class="mb-2">
                            <label for="merk" class="form-label">Merk Sepeda</label>
                            <input value="<?= $sepeda->merk_sepeda; ?>" name="merk_sepeda" type="text" class="form-control form-control-sm" id="merk" placeholder="Masukan Merk">
                        </div>
                        <div class="mb-2">
                            <label for="harga" class="form-label">Spesifikasi</label>
                            <textarea name="spesifikasi" class="form-control form-control-sm" id="" rows="5" placeholder="Masukan Sepesifikasi"><?= $sepeda->spesifikasi; ?></textarea>
                        </div>
                        <div class="mb-2">
                            <label for="harga" class="form-label">Harga</label>
                            <input value="<?= $sepeda->harga; ?>" name="harga" type="number" class="form-control form-control-sm" id="harga" placeholder="Masukan Harga">
                        </div>
                        <div>
                            <label for="gambar" class="form-label">Gambar</label>
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="gambar" type="file" type="file" class="custom-file-input" id="inputGroupFile04">
                                <label class="custom-file-label" for="inputGroupFile04">Masukan Gambar</label>
                            </div>
                        </div>
                        <input value="<?= $sepeda->id_sepeda; ?>" name="id_sepeda" type="hidden">
                        <input value="<?= $sepeda->gambar; ?>" name="gambar" type="hidden">
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <button type="reset" class="btn btn-warning btn-sm">Batal</button>
                            <button style="margin-left: 5px;" class="btn btn-success btn-sm">Simpan</button>
                        </div>
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->
            </form>

        </div>
    </div>
</div>