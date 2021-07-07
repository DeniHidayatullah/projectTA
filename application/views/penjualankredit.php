<div class="container-fluid">
<div id="content" data-url="<?= base_url('penjualan') ?>">
<?= $this->session->flashdata('pesan') ?>

<div class="card shadow mb-4">
<div class="card-header">
<strong>Isi Form Dibawah Ini!</strong></div>
<div class="card-body">
<form action="<?= base_url('penjualan/proses_tambahkredit') ?>" id="form-tambah" method="POST">
<div class="form-row">
<div class="form-group col-2">
<label>No. Penjualan</label>
<input type="text" name="nomor_faktur" value="PJ<?= time() ?>" readonly class="form-control">
</div>
<div class="form-group col-2">
<label>Tanggal Penjualan</label>
<input type="text" name="tanggal" value="<?= date('Y/m/d') ?>" readonly class="form-control">
</div>
</div>
<h5>Data Barang</h5>
<hr>
<div class="form-row">
<div class="form-group col-3">
<label for="barang_kode">Nama Barang</label>
<select name="barang_kode" id="barang_kode" class="barang_kode form-control">
<option disabled="disabled" selected="selected">Pilih Barang</option>
<?php foreach ($all_barang as $barang): ?>
	<option value="<?= $barang->barang_kode ?>"><?= $barang->barang_nama ?></option>
<?php endforeach ?>
</select>
</div>
<input type="hidden" name="barang_nama" value="" readonly class="form-control">
<div class="form-group col-2">
<label>Jenis Bahan</label>
<input type="text" name="jenis_bahan" value="" readonly class="form-control">
</div>
<div class="form-group col-2">
<label>Type Barang</label>
<input type="text" name="type_barang" value="" readonly class="form-control">
</div>
<input type="hidden" name="barang_kode" value="" readonly class="form-control">
<div class="form-group col-3">
<label for="id_jenis_pembayaran">Pembayaran</label>
<select name="id_jenis_pembayaran" id="id_jenis_pembayaran" class="form-control">
<option value="">Pilih Pembayaran</option>
<option value='2'>Kredit Bulanan</option>
<option value='3'>Kredit Musiman</option>
			<!-- <?php foreach ($all_pembayaran as $pembayaran): ?>
				<option value="<?= $pembayaran->id_jenis_pembayaran ?>"><?= $pembayaran->nama_pembayaran ?></option>
				<?php endforeach ?> -->
			</select>
		</div>
		<input type="hidden" name="tambah_harga" value="" readonly class="form-control">
		<div class="form-group col-2">
			<label>Lama Angsuran </label>
			<input type="number" name="lama_angsuran" value="" readonly class="form-control">
		</div>
		<input type="hidden" name="harga" id="harga" value="" readonly class="form-control">
		<div class="form-group col-2">
			<label>Harga </label>
			<input type="number" id="harga2" name="harga2" value="" readonly class="form-control">
		</div>
		<div class="form-group col-2">
			<label>Jumlah</label>
			<input type="number" id="jumlah" name="jumlah" value="" class="form-control" readonly min='1'>
		</div>
		<div class="form-group col-2">
			<label>Sub Total</label>
			<input type="number" id="sub_total" name="sub_total" value="" class="form-control" readonly>
		</div>
		<div class="form-group col-1">
			<label for="">&nbsp;</label>
			<button disabled type="button" class="btn btn-primary btn-block" id="tambah"><i class="fa fa-plus"></i></button>
		</div>
	</div>
	<div class="keranjangkredit">
		<h5>Detail Penjualan</h5>
		<hr>
		<table class="table table-bordered" id="keranjangkredit">
			<thead>
				<tr>
					<td width="20%">Nama Barang</td>
					<td width="15%">Jenis Bahan</td>
					<td width="16%">Type Barang</td>
					<td width="15%">Harga</td>
					<td width="15%">Jumlah</td>
					<td width="9%">Sub Total</td>
					<td width="10%">Aksi</td>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
	<table class="table table-bordered" id="bayarkredit">
		<thead>
			<tr>
				<td width="30%">Nama Pembeli</td>
				<td width="30%">Alamat Pembeli</td>
				<td width="20%">No Telpon</td>
				<td width="10%">Foto KTP</td>
				<?php foreach ($all_pembayaran as $pembayaran): ?>
					<?php if($pembayaran->id_jenis_pembayaran==2) { ?>
						<td width="10%">DP</td><?php } 
						?>
					<?php endforeach ?>
				</tr>
			</thead>
			<tbody>

			</tbody>
			<tfoot>
				<tr>
					<td colspan="4" align="right"><strong>Total : </strong></td>
					<td id="total"></td>
				</tr>
				<tr>
					<td colspan="4" align="right"><strong>Grand Total : </strong></td>
					<td>
						<div name="Grand_Total" id="Grand_Total">
							
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="5" align="right">
						<input type="hidden" name="total_hidden" id="total_hidden" value="">
						<input type="hidden" name="max_hidden" value="">
						<input type="hidden" name="Grand_Total" id="Grand_Total" value="">
						<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
					</td>
				</tr>
			</tfoot>
		</table>
	</form>
</div>	
</div>
<!-- /.card -->
</div>

<!-- /.container-fluid -->

</div>


<script>
function myFunction() {
var GrandTotal = parseInt(document.getElementById("total_hidden").value) - parseInt($('input[name="dp_hidden"]').val());

document.getElementById("Grand_Total").innerHTML = GrandTotal;
$('input[name="Grand_Total"]').val(GrandTotal);
}
</script>


<script>
$(document).ready(function(){
$('tfoot').hide()

$(document).keypress(function(event){
if (event.which == '13') {
	event.preventDefault();
}
})

$('#barang_kode').on('change', function(){

if($(this).val() == '') reset()
	else {
		const url_get_all_barang = $('#content').data('url') + '/get_all_barang'
		$.ajax({
			url: url_get_all_barang,
			type: 'POST',
			dataType: 'json',
			data: {barang_kode: $(this).val()},
			success: function(data){
				$('input[name="barang_nama"]').val(data.barang_nama)
				$('input[name="jenis_bahan"]').val(data.jenis_bahan)
				$('input[name="type_barang"]').val(data.type_barang)
				$('input[name="biaya_produksi"]').val(data.biaya_produksi)
				$('input[name="biaya_distribusi"]').val(data.biaya_distribusi)
				$('input[name="biaya_tukang"]').val(data.biaya_tukang)
				$('input[name="biaya_lainlain"]').val(data.biaya_lainlain)
				$('input[name="keuntungan"]').val(data.keuntungan)
				$('input[name="jumlah"]').val(0)
				$('input[name="max_hidden"]').val(data.stok)
				$('input[name="jumlah"]').prop('readonly', false)

				$('input[name="harga"]').val(parseInt(data.harga_asli) + parseInt(data.biaya_produksi)
					+ parseInt(data.biaya_distribusi)+ parseInt(data.biaya_tukang)+ parseInt(data.biaya_lainlain)
					+ parseInt(data.keuntungan)
					)


				var hargatotal = parseInt(document.getElementById("harga2").value) * parseInt($('input[name="jumlah"]').val());
// $('input[name="sub_total"]').val($('input[name="jumlah"]').val() * total)
document.getElementById("sub_total").value = hargatotal;

$('input[name="jumlah"]').on('keydown keyup change blur', function(){
// $('input[name="sub_total"]').val($('input[name="jumlah"]').val() * $('input[name="harga"]').val())

var hargatotal = parseInt(document.getElementById("harga2").value) * parseInt($('input[name="jumlah"]').val());
// $('input[name="sub_total"]').val($('input[name="jumlah"]').val() * total)
document.getElementById("sub_total").value = hargatotal;
})
}
})
	}
})

$('#id_jenis_pembayaran').on('change', function(){


if ($(this).val() == '3') {
	$('#dp').prop('hidden', 'true');
} else {
	$('#dp').prop('hidden', false);
}

if($(this).val() == '') reset()
	else {
		const url_get_all_pembayaran = $('#content').data('url') + '/get_all_pembayaran'
		$.ajax({
			url: url_get_all_pembayaran,
			type: 'POST',
			dataType: 'json',
			data: {id_jenis_pembayaran: $(this).val()},
			success: function(data){

				$('input[name="tambah_harga"]').val(data.tambah_harga)
				$('input[name="lama_angsuran"]').val(data.lama_angsuran)
				$('input[name="harga2"]').val(data.harga2)

				var hargatotal = parseInt(document.getElementById("harga").value) + parseInt(data.tambah_harga);
// alxert(total);
document.getElementById("harga2").value = hargatotal;
$('button#tambah').prop('disabled', false)

}
})
}
})

//keranjang
$(document).on('click', '#tambah', function(e){
const url_keranjang_barangkredit = $('#content').data('url') + '/keranjang_barangkredit'
const data_keranjangkredit = {
barang_kode: $('select[name="barang_kode"]').val(),
id_jenis_pembayaran: $('select[name="id_jenis_pembayaran"]').val(),
barang_nama: $('input[name="barang_nama"]').val(),
jenis_bahan: $('input[name="jenis_bahan"]').val(),
type_barang: $('input[name="type_barang"]').val(),
harga_asli: $('input[name="harga_asli"]').val(),
biaya_produksi: $('input[name="biaya_produksi"]').val(),
biaya_distribusi: $('input[name="biaya_distribusi"]').val(),
biaya_tukang: $('input[name="biaya_tukang"]').val(),
biaya_lainlain: $('input[name="biaya_lainlain"]').val(),
keuntungan: $('input[name="keuntungan"]').val(),
jumlah: $('input[name="jumlah"]').val(),
harga: $('input[name="harga"]').val(),
harga2: $('input[name="harga2"]').val(),
sub_total: $('input[name="sub_total"]').val(),
}

if(parseInt($('input[name="max_hidden"]').val()) <= parseInt(data_keranjangkredit.jumlah)) {
alert('stok tidak tersedia! stok tersedia : ' + parseInt($('input[name="max_hidden"]').val()))	
} else {
$.ajax({
url: url_keranjang_barangkredit,
type: 'POST',
data: data_keranjangkredit,
success: function(data){
if($('select[name="barang_kode"]').val() == data_keranjangkredit.nama_barang) $('option[value="' + data_keranjang.nama_barang + '"]').hide()
reset()

$('table#keranjangkredit tbody').append(data)
$('tfoot').show()

$('#total').html('<strong>' + hitung_total() + '</strong>')
$('input[name="total_hidden"]').val(hitung_total())
}
})
}

})

//id bayar
$(document).ready(function(e){
const url_bayar_barangkredit = $('#content').data('url') + '/bayar_barangkredit'
const data_bayarkredit = {
barang_kode: $('select[name="barang_kode"]').val(),
id_jenis_pembayaran: $('select[name="id_jenis_pembayaran"]').val(),
nama_pembeli: $('input[name="nama_pembeli"]').val(),
alamat_pembeli: $('input[name="alamat_pembeli"]').val(),
no_telp: $('input[name="no_telp"]').val(),
foto_ktp: $('input[name="foto_ktp"]').val(),
dp: $('input[name="dp"]').val(),
}
$.ajax({
url: url_bayar_barangkredit,
type: 'POST',
data: data_bayarkredit,
success: function(data){
if($('select[name="barang_kode"]').val() == data_bayarkredit.id_jenis_pembayaran) $('option[value="' + data_bayar.id_jenis_pembayaran + '"]').hide()
reset()
$('table#bayarkredit tbody').append(data)
$('tfoot').show()

// $('#total').html('<strong>' + hitung_total() + '</strong>')
// $('input[name="total_hidden"]').val(hitung_total())
}
})

})


$(document).on('click', '#tombol-hapus', function(){
$(this).closest('.row-keranjangkredit').remove()

$('#total').html('<strong>' + hitung_total() + '</strong>')
$('input[name="total_hidden"]').val(hitung_total())

$('option[value="' + $(this).data('nama-barang') + '"]').show()

if($('tbody').children().length == 0) $('tfoot').hide()
})

$('button[type="submit"]').on('click', function(){
$('select[name="barang_kode"]').prop('disabled', true)
$('select[name="id_jenis_pembayaran"]').prop('disabled', true)
// $('input[name="barang_kode"]').prop('disabled', true)
$('input[name="harga2"]').prop('disabled', true)
$('input[name="jenis_bahan"]').prop('disabled', true)
$('input[name="type_barang"]').prop('disabled', true)
$('input[name="jumlah"]').prop('disabled', true)
$('input[name="sub_total"]').prop('disabled', true)
})

function hitung_total(){
let total = 0;
$('.sub_total').each(function(){
total += parseInt($(this).text())
})

return total;
}

function reset(){

$('#id_jenis_pembayaran').val('')
$('input[name="tambah_harga"]').val('')
$('input[name="lama_angsuran"]').val('')
$('input[name="harga2"]').val('')
$('#barang_kode').val('')
$('input[name="barang_kode"]').val('')
$('input[name="jenis_bahan"]').val('')
$('input[name="type_barang"]').val('')
$('input[name="harga"]').val('')
$('input[name="jumlah"]').val('')
$('input[name="sub_total"]').val('')
$('input[name="jumlah"]').prop('readonly', true)
$('button#tambah').prop('disabled', true)
}
})
</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<script>
$(document).ready(function() {
$('.barang_kode').select2();
$('.barang_kode').change(function(){
let barang_kode = this.value;
$.ajax({
url: '<?= base_url() ?>/Penjualan/getDateAjax',
method: 'post',
data: {barang_kode:barang_kode},
success: 
function(result){
}
});
});
});
</script>