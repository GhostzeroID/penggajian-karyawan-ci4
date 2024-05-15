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
            <form method="post" action="<?= base_url('laporandatagaji') ?>" style="margin-top:10px;">
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
        printWindow.document.write('<style>');
        printWindow.document.write('body {font-size: 12px; margin: 0; padding: 0;}');
        printWindow.document.write('.container {width: 80%; margin: auto; text-align: left; padding-left: 10%; padding-right: 10%;}');
        printWindow.document.write('h1, h2, h3 {text-align: center;}');
        printWindow.document.write('table {border-collapse: collapse; width: 100%; align-items: center; margin-top: 20px;}');
        printWindow.document.write('th, td {border: 1px solid #ddd; padding: 8px; text-align: left;}');
        printWindow.document.write('th {background-color: #f2f2f2;}');
        printWindow.document.write('@media print {');
        printWindow.document.write('  body {-webkit-print-color-adjust: exact; font-size: 10px; margin: 0; padding: 0;}');
        printWindow.document.write('  .container {width: 100%; margin: 0 auto; text-align: center; padding-left: 0; padding-right: 0;}');
        printWindow.document.write('  table {page-break-inside: auto; margin: 0 auto; font-size: 10px; width: 80%;}');
        printWindow.document.write('  th, td {border: 1px solid #ddd; padding: 8px; text-align: left;}');
        printWindow.document.write('  th {background-color: #f2f2f2;}');
        printWindow.document.write('}');
        printWindow.document.write('</style>');

        printWindow.document.write('</head><body>');
        printWindow.document.write('<div class="container">');
        printWindow.document.write('<h1>PT Barbara Sejahtera Indonesia</h1>');
        printWindow.document.write('<h2>Data Gaji Pegawai</h2>');
        printWindow.document.write('<h3><strong><?= $gaji[0]['bulan']; ?>/<?= $gaji[0]['tahun']; ?></strong></h3>');
        printWindow.document.write('<br>');
        printWindow.document.write('<table>');
        printWindow.document.write('<thead><tr>');
        printWindow.document.write('<th>No</th>');
        printWindow.document.write('<th>NIK</th>');
        printWindow.document.write('<th>Nama Pegawai</th>');
        printWindow.document.write('<th>Jenis Kelamin</th>');
        printWindow.document.write('<th>Jabatan</th>');
        printWindow.document.write('<th>Gaji Pokok</th>');
        printWindow.document.write('<th>Tunjangan Transport</th>');
        printWindow.document.write('<th>Uang Makan</th>');
        printWindow.document.write('<th>BPJS Kesehatan</th>');
        printWindow.document.write('<th>BPJS Ketenagakerjaan</th>');
        printWindow.document.write('<th>Potongan Perhari</th>');
        printWindow.document.write('<th>Total Gaji</th>');
        printWindow.document.write('</tr></thead>');
        printWindow.document.write('<tbody>');

        <?php $no = 1;
        foreach ($gaji as $row) : ?>
            printWindow.document.write('<tr>');
            printWindow.document.write('<td style="white-space: nowrap;"><?= $no++; ?></td>');
            printWindow.document.write('<td style="white-space: nowrap;"><?= $row['nik']; ?></td>');
            printWindow.document.write('<td style="white-space: nowrap;"><?= $row['nama_pegawai']; ?></td>');
            printWindow.document.write('<td style="white-space: nowrap;"><?= $row['jenis_kelamin']; ?></td>');
            printWindow.document.write('<td style="white-space: nowrap;"><?= $row['nama_jabatan']; ?></td>');
            printWindow.document.write('<td style="white-space: nowrap;">Rp <?= number_format($row['gaji_pokok'], 0, ',', '.'); ?></td>');
            printWindow.document.write('<td style="white-space: nowrap;">Rp <?= number_format($row['tj_transport'], 0, ',', '.'); ?></td>');
            printWindow.document.write('<td style="white-space: nowrap;">Rp <?= number_format($row['uang_makan'], 0, ',', '.'); ?></td>');
            printWindow.document.write('<td style="white-space: nowrap;">Rp <?= number_format($row['pbpjsk'], 0, ',', '.'); ?></td>');
            printWindow.document.write('<td style="white-space: nowrap;">Rp <?= number_format($row['pbpjskk'], 0, ',', '.'); ?></td>');
            printWindow.document.write('<td style="white-space: nowrap;">Rp <?= number_format($row['pph'], 0, ',', '.'); ?></td>');
            printWindow.document.write('<td style="white-space: nowrap;">Rp <?= number_format($row['total_gaji'], 0, ',', '.'); ?></td>');
            printWindow.document.write('</tr>');
        <?php endforeach; ?>

        printWindow.document.write('</tbody></table>');
        printWindow.document.write('</div>');
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    }
</script>