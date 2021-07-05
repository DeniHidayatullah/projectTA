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
        <h2>LAPORAN PEMBELIAN</h2>
        <h4>Berdasarkan Periode Bulan</h4>
    </center>

    <br />

    <table border="1" class="table">
        <tr>
            <th>Nama Barang</th>
            <th>Jenis Barang</th>
            <th>Type Barang</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
        </tr>
        <?php
        foreach ($bybulan as $row) {
        ?>
            <tr>
                <td class="text-center"><?= $row->nama_barang; ?></td>
                <td class="text-center"><?= $row->jenis_barang; ?></td>
                <td class="text-center"><?= $row->type_barang; ?></td>
                <td class="text-center"><?= $row->harga; ?></td>
                <td class="text-center"><?= $row->jumlah; ?></td>
                <td class="text-center"><?= $row->total; ?></td>
            </tr>
        <?php }; ?>
    </table>

    <script>
        window.print();
    </script>
</body>

</html>