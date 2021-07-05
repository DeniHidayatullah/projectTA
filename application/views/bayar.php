<tr class="row-bayar">

	<td class="nama_pembeli">
		<?= $this->input->post('nama_pembeli') ?>
		<input type="text" name="nama_pembeli_hidden" required>
	</td>
	<td class="alamat_pembeli">
		<?= $this->input->post('alamat_pembeli') ?>
		<input type="text" name="alamat_pembeli_hidden" required>
	</td>
	<td>
		<?= $this->input->post('no_telp') ?>
		<input type="text" name="no_telp_hidden" required>
	</td>
	<td class="foto_ktp">
		<?= $this->input->post('foto_ktp') ?>
		<input type="file" name="foto_ktp_hidden" required>
	</td>
</tr>


