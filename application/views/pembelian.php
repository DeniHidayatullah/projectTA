<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1> Data Pembelian</h1>
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
                <div class="card-header">
                <a href="<?php echo base_url('pembelian/tambah') ?>" class="btn btn-success btn-sm btn-show-add">
                    <span class="icon text-white-50">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">Tambah Pembelian</span>
                </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
							<tr>
								<th>#</th>
								<th>Kode</th>
								<th>Nama Barang</th>
								<th>Jenis Barang</th>
								<th>Type Barang</th>
								<th>Total Harga</th>
								<th>Tanggal Pembelian</th>
								<th style="width: 130px">Aksi</th>
							</tr>
						</thead>
						<tfoot></tfoot>
                    <tbody>
                        <?php
                                $no = 1;
                                foreach ($pembelian as $row) {
                                ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['kode_pembelian'] ?></td>
                                <td><?= $row['nama_barang'] ?></td>
                                <td><?= $row['jenis_barang'] ?></td>
                                <td><?= $row['type_barang'] ?></td>
                                <td><?= $row['total'] ?></td>
                                <td><?= $row['tanggal'] ?></td>
                                <td>
									<a href="<?= base_url() ;?>pembelian/detail/<?= $row['kode_pembelian']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
									<a href="<?= base_url() ;?>pembelian/edit_data/<?= $row['kode_pembelian']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
									<a href="<?= base_url() ;?>pembelian/delete/<?= $row['kode_pembelian']; ?>" onclick="return confirm('Yakin ingin menghapus Data Pemeblian?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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