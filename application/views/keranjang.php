<tr class="row-keranjang">
<input type="hidden" name="id_jenis_pembayaran_hidden" value="<?= $this->input->post('id_jenis_pembayaran') ?>"></td>
		<input type="hidden" name="kode_barang_hidden[]" value="<?= $this->input->post('barang_kode') ?>">
	<td class="barang_nama">
		<?= $this->input->post('barang_nama') ?>
		<input type="hidden" name="nama_barang_hidden[]" value="<?= $this->input->post('barang_nama') ?>">
	</td>
	<td class="jenis_bahan">
		<?= $this->input->post('jenis_bahan') ?>
		<input type="hidden" name="jenis_bahan_hidden[]" value="<?= $this->input->post('jenis_bahan') ?>">
	</td>
	<td class="type_barang">
		<?= $this->input->post('type_barang') ?>
		<input type="hidden" name="type_barang_hidden[]" value="<?= $this->input->post('type_barang') ?>">
	</td>
	<td class="harga">
		<?= $this->input->post('harga') ?>
		<input type="hidden" name="harga_barang_hidden[]" id="harga2" value="<?= $this->input->post('harga') ?>">
	</td>
	<td class="jumlah">
		<?= $this->input->post('jumlah') ?>
		<input type="hidden" name="jumlah_hidden[]" value="<?= $this->input->post('jumlah') ?>">
	</td>
	<td class="sub_total">
		<?= $this->input->post('sub_total') ?>
		<input type="hidden" name="sub_total_hidden[]" value="<?= $this->input->post('sub_total') ?>">
	</td>
	<td class="aksi">
		<button type="button" class="btn btn-danger btn-sm" id="tombol-hapus" data-nama-barang="<?= $this->input->post('barang_nama') ?>"><i class="fa fa-trash"></i></button>
	</td>
</tr>



