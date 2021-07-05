<div class="container-fluid">

  <h1 class="h3 mb-2 text-gray-800">Edit Data Pembelian</h1>
  <form action="<?php echo base_url()."pembelian/update_data"; ?>" method="post">

    <div class="card shadow mb-4">
      <div class="card-body">
        <!-- /.row -->
        <div class="row"><?= $this->session->flashdata('pesan') ?>
          <div class="col-lg-12">
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-6">
                 <div class="form-group">
                    <label>Kode Pembelian</label>
                    <input class="form-control" type="text" id="kode_pembelian" name="kode_pembelian" readonly value="<?php echo $kode_pembelian; ?>">
                  </div>
                  <div class="form-group">
                    <label>Nama Barang</label>
                    <input class="form-control" type="text" id="nama_barang" name="nama_barang" required value="<?php echo $nama_barang; ?>">
                  </div>
                  <div class="form-group">
                    <label>Jenis Bahan</label>
                    <input class="form-control" type="text" id="jenis_barang" name="jenis_barang" required value="<?php echo $jenis_barang; ?>">
                  </div>
                  <div class="form-group">
                    <label>Type Barang</label>
                    <input class="form-control" type="text" id="type_barang" name="type_barang" required value="<?php echo $type_barang; ?>">
                  </div>
                </div>
                <!-- /.col-lg-6 nested -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Harga</label>
                    <input class="form-control" type="number" id="harga" name="harga" required value="<?php echo $harga; ?>">
                  </div>
                  <div class="form-group">
                    <label>Jumlah</label>
                    <input class="form-control" type="number" id="jumlah" name="jumlah" required value="<?php echo $jumlah; ?>">
                  </div>
                  <div class="form-group">
                    <label>Total</label>
                    <input class="form-control" type="number" id="total" name="total" readonly value="<?php echo $total; ?>">
                  </div>
                  <div class="form-group">
                    <label>Tanggal Pembelian</label>
                    <input class="form-control" type="date" id="tanggal" name="tanggal" readonly value="<?php echo $tanggal; ?>">
                  </div>
                  <input class="btn btn-info btn-icon-split" type="submit" name="submit" value="Update">
                  <!-- <button type="submit" class="btn btn-info btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">Kirim Data</span>
                  </button> -->
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

</div>

<!-- /.container-fluid -->
</form>