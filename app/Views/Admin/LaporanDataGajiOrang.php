<div class="content-wrapper" style="min-height: 651px;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title; ?></h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <form method="post" action="<?= base_url('laporandatagajipegawai') ?>" style="margin-top:10px;">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Filter Data Gaji</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <label>Bulan</label>
                                <select class="form-control" name="bulan" id="bulan">
                                    <option value="">--Pilih Bulan--</option>
                                    <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juni</option>
                                    <option value="07">Juli</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                            <div class="col-5">
                                <label>Tahun</label>
                                <select class="form-control" name="tahun">
                                    <option value="">--Pilih Tahun--</option>
                                    <?php
                                    $tahunSekarang = date("Y");
                                    for ($tahun = $tahunSekarang; $tahun >= ($tahunSekarang - 10); $tahun--) {
                                        echo "<option value=\"$tahun\">$tahun</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-5">
                                <label>Nama Pegawai</label>
                                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Pegawai">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" style="margin-top:10px;">
                            <i class="fas fa-eye"></i> Filter
                        </button>
                    </div>
                </div>
            </form>
            <div class="alert alert-info">
                Silahkan fiter data untuk mencetak Laporan Gaji!<span class="font-weight-bold"></span>
            </div>
            <?php
            $jumlah_data = count($gaji);
            if ($jumlah_data > 0) {
            ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <button class="btn btn-sm btn-primary" onclick="printData()"><i class="fas fa-print"></i> Cetak Tabel</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tableData" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="white-space: nowrap;">No</th>
                                            <th style="white-space: nowrap;">Bulan</th>
                                            <th style="white-space: nowrap;">Tahun</th>
                                            <th style="white-space: nowrap;">NIK</th>
                                            <th style="white-space: nowrap;">Nama Pegawai</th>
                                            <th style="white-space: nowrap;">Jenis Kelamin</th>
                                            <th style="white-space: nowrap;">Jabatan</th>
                                            <th style="white-space: nowrap;">Gaji Pokok</th>
                                            <th style="white-space: nowrap;">Tunjangan Transport</th>
                                            <th style="white-space: nowrap;">Uang Makan</th>
                                            <th style="white-space: nowrap;">BPJS Kesehatan</th>
                                            <th style="white-space: nowrap;">BPJS Ketenagakerjaan</th>
                                            <th style="white-space: nowrap;">Potongan Perhari</th>
                                            <th style="white-space: nowrap;">Total Gaji</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($gaji as $row) : ?>
                                            <tr>
                                                <td style="white-space: nowrap;"><?= $no++; ?></td>
                                                <td style="white-space: nowrap;"><?= $row['bulan']; ?></td>
                                                <td style="white-space: nowrap;"><?= $row['tahun']; ?></td>
                                                <td style="white-space: nowrap;"><?= $row['nik']; ?></td>
                                                <td style="white-space: nowrap;"><?= $row['nama_pegawai']; ?></td>
                                                <td style="white-space: nowrap;"><?= $row['jenis_kelamin']; ?></td>
                                                <td style="white-space: nowrap;"><?= $row['nama_jabatan']; ?></td>
                                                <td style="white-space: nowrap;">Rp. <?= number_format($row['gaji_pokok'], 0, ',', '.'); ?></td>
                                                <td style="white-space: nowrap;">Rp. <?= number_format($row['tj_transport'], 0, ',', '.'); ?></td>
                                                <td style="white-space: nowrap;">Rp. <?= number_format($row['uang_makan'], 0, ',', '.'); ?></td>
                                                <td style="white-space: nowrap;">Rp. <?= number_format($row['pbpjsk'], 0, ',', '.'); ?></td>
                                                <td style="white-space: nowrap;">Rp. <?= number_format($row['pbpjskk'], 0, ',', '.'); ?></td>
                                                <td style="white-space: nowrap;">Rp. <?= number_format($row['pph'], 0, ',', '.'); ?></td>
                                                <td style="white-space: nowrap;">Rp. <?= number_format($row['total_gaji'], 0, ',', '.'); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    <?php
            } else { ?>
        <span class="badge badge-danger"><i class="fas fa-info-circle"></i>Data Masih Kosong, Silahkan Input Data Bulan dan tahun yang anda pilih!.</span>
    <?php } ?>
</div>
</section>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    <?php if (session()->has('success')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '<?= session('success') ?>',
            showConfirmButton: false,
            timer: 1500
        });
    <?php endif; ?>

    <?php if (session()->has('errors')) : ?>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '<?= session('errors') ?>'
        });
    <?php endif; ?>

    function printData() {
        var printWindow = window.open('', '_blank');
        printWindow.document.write('<html><head><title></title>');
        printWindow.document.write('<style>');
        printWindow.document.write('body {font-family: Arial, sans-serif; font-size: 14px; margin: 20px;}');
        printWindow.document.write('.container {width: 80%; margin: auto; text-align: left;}');
        printWindow.document.write('.container h2,h3 {width: 80%; margin: auto; text-align: center;}');
        printWindow.document.write('table {width: 100%; border-collapse: collapse; margin-top: 20px;}');
        printWindow.document.write('th, td {border: 1px solid #ddd; padding: 12px; text-align: left;}');
        printWindow.document.write('th {background-color: #f2f2f2;}');
        printWindow.document.write('  pre {font-family: Arial, sans-serif;}');
        printWindow.document.write('@media print {');
        printWindow.document.write('  body {-webkit-print-color-adjust: exact;}');
        printWindow.document.write('  table {page-break-inside: auto; width: 100%;}');
        printWindow.document.write('  th, td {border: 1px solid #ddd; padding: 12px; text-align: left;}');
        printWindow.document.write('  th {background-color: #f2f2f2;}');
        printWindow.document.write('  pre {font-family: Arial, sans-serif;}');
        printWindow.document.write('}');
        printWindow.document.write('</style>');
        printWindow.document.write('</head><body>');

        printWindow.document.write('<div class="container">');
        printWindow.document.write('<div>');
        printWindow.document.write('<h2><strong>PT BARBARA SEJAHTERA INDONESIA</strong></h2>');

        <?php foreach ($gaji as $row) : ?>
            printWindow.document.write('<br>');
            printWindow.document.write('<h2><strong><?= $row["bulan"]; ?>/<?= $row["tahun"]; ?></strong></h2>');
            printWindow.document.write('<br>');
            printWindow.document.write('<br>');
            printWindow.document.write('<pre>');
            printWindow.document.write('<strong>Nama Pegawai      :</strong> <?= $row["nama_pegawai"]; ?><br><br>');
            printWindow.document.write('<strong>NIK                         :</strong> <?= $row["nik"]; ?><br><br>');
            printWindow.document.write('<strong>Jenis Kelamin       :</strong> <?= $row["jenis_kelamin"]; ?><br><br>');
            printWindow.document.write('<strong>Jabatan                  :</strong> <?= $row["nama_jabatan"]; ?><br><br>');
            printWindow.document.write('</pre>');
        <?php endforeach; ?>

        printWindow.document.write('</div>');
        printWindow.document.write('<table>');
        printWindow.document.write('<thead><tr>');
        printWindow.document.write('<th>No</th>');
        printWindow.document.write('<th>Deskripsi</th>');
        printWindow.document.write('<th>Jumlah</th>');
        printWindow.document.write('</tr></thead>');
        printWindow.document.write('<tbody>');

        <?php $no = 1;
        foreach ($gaji as $row) : ?>
            printWindow.document.write('<tr>');
            printWindow.document.write('<td><?= $no++; ?></td>');
            printWindow.document.write('<td>Gaji Pokok</td>');
            printWindow.document.write('<td>Rp <?= number_format($row["gaji_pokok"], 0, ",", "."); ?></td>');
            printWindow.document.write('</tr>');

            printWindow.document.write('<tr>');
            printWindow.document.write('<td><?= $no++; ?></td>');
            printWindow.document.write('<td>Transportasi</td>');
            printWindow.document.write('<td>Rp <?= number_format($row["tj_transport"], 0, ",", "."); ?></td>');
            printWindow.document.write('</tr>');

            printWindow.document.write('<tr>');
            printWindow.document.write('<td><?= $no++; ?></td>');
            printWindow.document.write('<td>Uang Makan</td>');
            printWindow.document.write('<td>Rp <?= number_format($row["uang_makan"], 0, ",", "."); ?></td>');
            printWindow.document.write('</tr>');

            printWindow.document.write('<tr>');
            printWindow.document.write('<td><?= $no++; ?></td>');
            printWindow.document.write('<td>BPJS Kesehatan</td>');
            printWindow.document.write('<td>Rp <?= number_format($row["pbpjsk"], 0, ",", "."); ?></td>');
            printWindow.document.write('</tr>');

            printWindow.document.write('<tr>');
            printWindow.document.write('<td><?= $no++; ?></td>');
            printWindow.document.write('<td>BPJS Ketenagakerjaan</td>');
            printWindow.document.write('<td>Rp <?= number_format($row["pbpjskk"], 0, ",", "."); ?></td>');
            printWindow.document.write('</tr>');

            printWindow.document.write('<tr>');
            printWindow.document.write('<td><?= $no++; ?></td>');
            printWindow.document.write('<td>Potongan Perhari</td>');
            printWindow.document.write('<td>Rp <?= number_format($row["pph"], 0, ",", "."); ?></td>');
            printWindow.document.write('</tr>');


            printWindow.document.write('<tr>');
            printWindow.document.write('<td colspan="2"><strong>Total Gaji</strong></td>');
            printWindow.document.write('<td><strong>Rp <?= number_format($row["total_gaji"], 0, ",", "."); ?></strong></td>');
            printWindow.document.write('</tr>');
        <?php endforeach; ?>

        printWindow.document.write('</tbody></table>');
        printWindow.document.write('</div>');
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    }
</script>