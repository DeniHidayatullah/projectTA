<div class="container-fluid">

  <h1 class="h3 mb-2 text-gray-800">Tambah Data Pembelian</h1>
  <?= $this->session->flashdata('pesan') ?>
  <form action="" method="post" enctype="multipart/form-data">

    <div class="card shadow mb-4">
      <div class="card-body">
        <!-- /.row -->
        <div class="row">
          <div class="col-lg-12">
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-6">
                 <div class="form-group">
                    <label>Kode Pembelian</label>
                    <input class="form-control" type="text" id="kode_pembelian" name="kode_pembelian" value="kdp<?php echo sprintf("%04s", $kode_pembelian) ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label>Nama Barang</label>
                    <input class="form-control" type="text" id="nama_barang" name="nama_barang" required>
                  </div>
                  <div class="form-group">
                    <label>Jenis Barang</label>
                    <input class="form-control" type="text" id="jenis_barang" name="jenis_barang" required>
                  </div>
                  <div class="form-group">
                    <label>Type Barang</label>
                    <input class="form-control" type="text" id="type_barang" name="type_barang" required>
                  </div>
                </div>
                <!-- /.col-lg-6 nested -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Harga </label>
                    <input class="form-control" type="number" id="harga" name="harga" required>
                  </div>
                  <div class="form-group">
                    <label>Jumlah</label>
                    <input class="form-control" type="number" id="jumlah" name="jumlah" required>
                  </div>
                  <div class="form-group">
                    <label>Tanggal Pembelian</label>
                    <input class="form-control" type="date" id="tanggal" name="tanggal" required>
                  </div>
                  <button type="submit" class="btn btn-info btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">Kirim Data</span>
                  </button>
                  <a href="<?= base_url('pembelian') ?>" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fa fa-reply"></i>
                    </span>
                    <span class="text">Kembali</span>
                  </a>
                </div>
                <!-- /.col-lg-6 (nested) -->

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

    </form>
</div>

<!-- /.container-fluid -->