<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1> Detail Data Pembelian</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?=base_url("dashboard");?>">Dashboard</a></li>
                            <li class="active">Pembelian</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="card">
            
        <?php foreach ($data as $d) {?>
                <div class="card-header">
                <a href="<?php echo base_url('pembelian') ?>" class="btn btn-danger btn-sm btn-show-add">
                    <span class="icon text-white-50">
                        <i class="fa fa-reply"></i>
                    </span>
                    <span class="text">Kembali</span>
                </a>
                </div>
                <div class="card-body">
                <div class="row">
                <div class="col-md-7">
                    <div class="card-body">
                        <table>
                            <tr>
                                <td>Kode Pembelian</td>
                                <td>: <?= $d['kode_pembelian']; ?></td>
                            </tr>
                            <tr>
                                <td>Nama Barang</td>
                                <td>: <?= $d['nama_barang']; ?></td>
                            </tr>
                            <tr>
                                <td>Jenis Barang</td>
                                <td>: <?= $d['jenis_barang']; ?></td>
                            </tr>
                            <tr>
                                <td>Type Barang</td>
                                <td>: <?= $d['type_barang']; ?></td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td>: Rp.<?= $d['harga']; ?></td>
                            </tr>
                            <tr>
                                <td>Jumlah</td>
                                <td>: <?= $d['jumlah']; ?></td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>: Rp.<?= $d['total']; ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal</td>
                                <td>: <?= $d['tanggal']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div> 
		</div>
                </div>
            </div>
        </div>
<?php } ?>