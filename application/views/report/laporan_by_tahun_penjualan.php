<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Berdasarkan bulan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
    
<style>
  .center {
  margin-left: auto;
  margin-right: auto;
    }
@page { size: A4 }
  
    h1 {
        font-weight: bold;
        font-size: 20pt;
        text-align: center;
    }
  
    table {
        border-collapse: collapse;
        width: 100%;
    }
  
    .table th {
        padding: 8px 8px;
        border:1px solid #000000;
        text-align: center;
    }
  
    .table td {
        padding: 3px 3px;
        border:1px solid #000000;
    }
  
    .text-center {
        text-align: center;
    }
</style>
</head>

<body class="A4">
    <center>
        <h2>LAPORAN PENJUALAN</h2>
        <h4>Berdasarkan Periode Tahun</h4>
    </center>

    <br />

    <table border="1" class="table">
        <thead>
            <tr>
                <th>Nomor Faktur</th>
                <th>Nama Barang</th>
                <th>Jenis Barang</th>
                <th>Type Barang</th>
                <th>Nama Pembeli</th>
                <th>Alamat</th>
                <th>No Telpon</th>
                <th>Jenis Pembayaran</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($bytahun as $row) {
            ?>
                <tr>
                    <td class="text-center"><?= $row->nomor_faktur; ?></td>
                    <td class="text-center"><?= $row->barang_nama; ?></td>
                    <td class="text-center"><?= $row->jenis_bahan; ?></td>
                    <td class="text-center"><?= $row->type_barang; ?></td>
                    <td class="text-center"><?= $row->nama_pembeli; ?></td>
                    <td class="text-center"><?= $row->alamat_pembeli; ?></td>
                    <td class="text-center"><?= $row->no_telp; ?></td>
                    <td class="text-center"> <?php if ($row->id_jenis_pembayaran == '1') { ?>
                            <span>Cash</span>
                        <?php } elseif ($row->id_jenis_pembayaran == '2') { ?>
                            <span>Kredit Bulanan</span>
                        <?php } elseif ($row->id_jenis_pembayaran == '3') { ?>
                            <span>Kredit Musiman</span>
                        <?php } ?></td>
                    <td class="text-center"><?= $row->jumlah; ?></td>
                    <td class="text-center"><?= $row->total; ?></td>
                </tr>
            <?php }; ?>
            <?php
            foreach ($sum as $r) {
            ?>
                <tr>
                    <td colspan="9" align="right"><strong>Jumlah Total</strong></td>
                    <td colspan="1" align="right"><strong><?= $r->grand;?> </strong></td>
                </tr>
            <?php }; ?>
        </tbody>
    </table>

    <script>
        window.print();
    </script>
</body>

</html>