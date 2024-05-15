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
            <form method="post" action="<?= base_url('laporandataabsesni') ?>" style="margin-top:10px;">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Filter Data Absensi</h3>
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
                Silahkan fiter data untuk mencetak Laporan Absensi!<span class="font-weight-bold"></span>
            </div>
            <?php
            $jumlah_data = count($kehadiran);
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
                                            <th>No</th>
                                            <th>Bulan</th>
                                            <th>NIK</th>
                                            <th>Nama Pegawai</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Jabatan</th>
                                            <th>Hadir</th>
                                            <th>Izin</th>
                                            <th>Alpha</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($kehadiran as $row) : ?>
                                            <tr>
                                                <td style="white-space: nowrap;"><?= $no++; ?></td>
                                                <td style="white-space: nowrap;"><?= $row['bulan']; ?></td>
                                                <td style="white-space: nowrap;"><?= $row['nik']; ?></td>
                                                <td style="white-space: nowrap;"><?= $row['nama_pegawai']; ?></td>
                                                <td style="white-space: nowrap;"><?= $row['jenis_kelamin']; ?></td>
                                                <td style="white-space: nowrap;"><?= $row['nama_jabatan']; ?></td>
                                                <td style="white-space: nowrap;"><?= $row['hadir']; ?></td>
                                                <td style="white-space: nowrap;"><?= $row['sakit']; ?></td>
                                                <td style="white-space: nowrap;"><?= $row['alpha']; ?></td>
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
        printWindow.document.write('body {font-size: 12px; margin: 0; padding: 0;}');
        printWindow.document.write('table {border-collapse: collapse; width: 90%;}');
        printWindow.document.write('th, td {border: 1px solid #ddd; padding: 8px; text-align: left;}');
        printWindow.document.write('th {background-color: #f2f2f2;}');
        printWindow.document.write('h1, h2, h3{text-align: center;}');
        printWindow.document.write('@media print {');
        printWindow.document.write('  body {-webkit-print-color-adjust: exact;}');
        printWindow.document.write('  table {page-break-inside: auto;}');
        printWindow.document.write('  tr {page-break-inside: avoid; page-break-after: auto;}');
        printWindow.document.write('  thead {display: table-header-group;}');
        printWindow.document.write('}');
        printWindow.document.write('</style>');
        printWindow.document.write('</head><body>');
        printWindow.document.write('<h1>PT Barbara Sejahtera Indonesia</h1>');
        printWindow.document.write('<h2>Data Absensi Pegawai</h2>');
        printWindow.document.write('<h3><strong><?= $kehadiran[0]['bulan']; ?>/<?= $kehadiran[0]['tahun']; ?></strong></h3>');
        printWindow.document.write('<br>');
        printWindow.document.write('<table>');
        printWindow.document.write('<thead><tr>');
        printWindow.document.write('<th>No</th>');
        printWindow.document.write('<th>NIK</th>');
        printWindow.document.write('<th>Nama Pegawai</th>');
        printWindow.document.write('<th>Jenis Kelamin</th>');
        printWindow.document.write('<th>Jabatan</th>');
        printWindow.document.write('<th>Hadir</th>');
        printWindow.document.write('<th>Sakit</th>');
        printWindow.document.write('<th>Alpha</th>');
        printWindow.document.write('</tr></thead>');
        printWindow.document.write('<tbody>');

        <?php $no = 1;
        foreach ($kehadiran as $row) : ?>
            printWindow.document.write('<tr>');
            printWindow.document.write('<td><?= $no++; ?></td>');
            printWindow.document.write('<td><?= $row['nik']; ?></td>');
            printWindow.document.write('<td><?= $row['nama_pegawai']; ?></td>');
            printWindow.document.write('<td><?= $row['jenis_kelamin']; ?></td>');
            printWindow.document.write('<td><?= $row['nama_jabatan']; ?></td>');
            printWindow.document.write('<td><?= $row['hadir']; ?></td>');
            printWindow.document.write('<td><?= $row['sakit']; ?></td>');
            printWindow.document.write('<td><?= $row['alpha']; ?></td>');
            printWindow.document.write('</tr>');
        <?php endforeach; ?>

        printWindow.document.write('</tbody></table>');
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    }
</script>