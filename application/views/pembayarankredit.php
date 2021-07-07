<div class="container-fluid">

  <h1 class="h3 mb-2 text-gray-800">Pembayaran</h1>
  <form action="<?= base_url('Pembayaran/tambah_cicilan') ?>" method="post" enctype="multipart/form-data">

    <div class="card shadow mb-4">
      <div class="card-body">
        <!-- /.row -->
        <div class="row"><?= $this->session->flashdata('pesan') ?>
          <div class="col-lg-12">
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-6">
                    <input class="form-control" type="hidden" disabled  name="kode_angsuran">
                  <div class="form-group">
                    <label>Nomor Faktur</label>
                    <input class="form-control" type="text" id="nomor_faktur" name="nomor_faktur" value="<?= $nomor_faktur ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Angsuran Ke</label>
                    <input class="form-control" type="text" id="angsuran_ke" name="angsuran_ke" required>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Bayar</label>
                    <input class="form-control" type="number"  id="bayar" name="bayar" value="<?= $bayar ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Tanggal</label>
                    <input class="form-control" type="date" id="tanggal" name="tanggal" required>
                   </div>
                  <button type="submit" class="btn btn-info btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">Kirim Data</span>
                  </button>
                  <a href="<?= base_url('Penjualan') ?>" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fa fa-reply"></i>
                    </span>
                    <span class="text">Kembali</span>
                  </a>
                </div>
              </div>
              <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.card -->

</div>

<!-- /.container-fluid -->
</form>