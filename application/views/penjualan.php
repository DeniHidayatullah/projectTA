<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1> Data Penjualan</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?=base_url("dashboard");?>">Dashboard</a></li>
                            <li class="active">Penjualan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="card">
                <div class="card-header">
                <a href="<?php echo base_url('penjualan/tambahcash') ?>" class="btn btn-success btn-sm btn-show-add">
                    <span class="icon text-white-50">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">Tambah Penjualan Cash</span>
                </a>
                
                <a href="<?php echo base_url('penjualan/tambahkredit') ?>" class="btn btn-primary btn-sm btn-show-add">
                    <span class="icon text-white-50">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">Tambah Penjualan Kredit</span>
                </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
							<tr>
								<th>#</th>
								<th>Nomor Faktur</th>
								<th>Nama Barang</th>
								<th>Nama Pembeli</th>
								<th>Pembayaran</th>
								<th>Tanggal Penjualan</th>
								<th style="width: 130px">Aksi</th>
							</tr>
						</thead>
						<tfoot></tfoot>
                    <tbody>
                        <?php
                                $no = 1;
                                foreach ($penjualan as $row) {
                                ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['nomor_faktur'] ?></td>
                                <td><?= $row['barang_nama'] ?></td>
                                <td><?= $row['nama_pembeli'] ?></td>
                                <td> <?php if ($row['id_jenis_pembayaran'] == '1') { ?>
                                    <span>Cash</span>
                                <?php } elseif ($row['id_jenis_pembayaran'] == '2') { ?>
                                    <span>Kredit Bulanan</span>
                                <?php } elseif ($row['id_jenis_pembayaran'] == '3') { ?>
                                    <span>Kredit Musiman</span>
                                <?php } ?></td>
                                <td><?= $row['tanggal'] ?></td>
                                <td>
									<a href="<?= base_url() ;?>penjualan/detail/<?= $row['nomor_faktur']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
									<!-- <a href="<?= base_url() ;?>penjualan/edit_data/<?= $row['nomor_faktur']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a> -->
									<a href="<?= base_url() ;?>penjualan/delete/<?= $row['nomor_faktur']; ?>" onclick="return confirm('Yakin ingin menghapus Data Pemeblian?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
								</td>
                            </tr>
                        <?php } ?> 
                    </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script>
$(document).ready(function() {
    $('#example').DataTable( {
        "lengthMenu": [[5, 10, 15,20, -1], [5, 10, 15,20, "All"]]
    } );
} );
</script>