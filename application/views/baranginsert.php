<div class="container-fluid">

  <h1 class="h3 mb-2 text-gray-800">Tambah Data Barang</h1>
  <form action="" method="post" enctype="multipart/form-data">

    <div class="card shadow mb-4">
      <div class="card-body">
        <!-- /.row -->
        <div class="row"><?= $this->session->flashdata('pesan') ?>
          <div class="col-lg-12">
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-6">
                 <div class="form-group">
                    <label>Kode Barang</label>
                    <input class="form-control" type="text" id="barang_kode" name="barang_kode" required>
                  </div>
                  <div class="form-group">
                    <label>Nama Barang</label>
                    <input class="form-control" type="text" id="barang_nama" name="barang_nama" required>
                  </div>
                  <div class="form-group">
                    <label>Jenis Barang</label>
                    <input class="form-control" type="text" id="jenis_bahan" name="jenis_bahan" required>
                  </div>
                  <div class="form-group">
                    <label>Type Barang</label>
                    <input class="form-control" type="text" id="type_barang" name="type_barang" required>
                  </div>
                  <div class="form-group">
                    <label>Harga Asli</label>
                    <input class="form-control" type="number" id="harga_asli" name="harga_asli" required>
                  </div>
                  <div class="form-group">
                    <label>Biaya Produksi</label>
                    <input class="form-control" type="number" id="biaya_produksi" name="biaya_produksi" required>
                    <small id="priceHelp" class="form-text text-muted">Jika Tidak Ada Biaya Produksi Kolom Diisi Dengan Angka 0.</small>
                  </div>
                  <div class="form-group">
                    <label>Biaya Tukang</label>
                    <input class="form-control" type="number" id="biaya_tukang" name="biaya_tukang" required>
                    <small id="priceHelp" class="form-text text-muted">Jika Tidak Ada Biaya Tukang Kolom Diisi Dengan Angka 0.</small>
                  </div>
                </div>
                <!-- /.col-lg-6 nested -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Biaya Distribusi</label>
                    <input class="form-control" type="number" id="biaya_distribusi" name="biaya_distribusi" required>
                    <small id="priceHelp" class="form-text text-muted">Jika Tidak Ada Biaya Distribusi Kolom Diisi Dengan Angka 0.</small>
                  </div>
                  <div class="form-group">
                    <label>Biaya Lain-Lain</label>
                    <input class="form-control" type="number" id="biaya_lainlain" name="biaya_lainlain" required>
                    <small id="priceHelp" class="form-text text-muted">Jika Tidak Ada Biaya Lain-Lain Kolom Diisi Dengan Angka 0.</small>
                  </div>
                  <div class="form-group">
                    <label>Keuntungan</label>
                    <input class="form-control" type="number" id="keuntungan" name="keuntungan" required>
                  </div>
                  <!-- <div class="form-group">
                    <label>Harga Tunai</label>
                    <input class="form-control" type="number" id="harga_tunai" name="harga_tunai">
                  </div>
                  <div class="form-group">
                    <label>Harga Kredit Bulanan</label>
                    <input class="form-control" type="number" id="harga_kredit_bulananan" name="harga_kredit_bulananan">
                  </div>
                  <div class="form-group">
                    <label>Harga Kredit Musiman</label>
                    <input class="form-control" type="number" id="harga_kredit_musiman" name="harga_kredit_musiman">
                  </div> -->
                  <div class="form-group">
                    <label>Stok</label>
                    <input class="form-control" type="number" id="stok" name="stok" required>
                  </div>
                  <div class="form-group">
                    <label>Foto Barang</label>
                    <input class="form-control" type="file" id="foto" name="foto" required>
                  </div>
                  <button type="submit" class="btn btn-info btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">Kirim Data</span>
                  </button>
                  <a href="<?= base_url('barang') ?>" class="btn btn-danger btn-icon-split">
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

</div>

<!-- /.container-fluid -->
</form>