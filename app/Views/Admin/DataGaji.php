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
            <div class="d-flex justify-content-start">
                <a class="btn btn-sm btn-success" href="<?= base_url('tambahdatagaji') ?>/"><i class="fas fa-plus"></i> Tambah Data Gaji</a>
            </div>
            <form method="post" action="<?= base_url('datagaji') ?>" style="margin-top:10px;">
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
            <?php
            if ((isset($_POST['bulan']) && $_POST['bulan'] != '') && (isset($_POST['tahun']) && $_POST['tahun'] != '')) {
                $bulan = $_POST['bulan'];
                $tahunf = $_POST['tahun'];
                $bulanTahun = $bulan . $tahunf;
            } else {
                $bulan = date('m');
                $tahunf = date('Y');
                $bulanTahun = $bulan . $tahunf;
            }
            ?>
            <div class="alert alert-info">
                <?php if (!empty($bulan) && !empty($tahunf)) : ?>
                    Menampilkan Data Gaji Pegawai Bulan <span class="font-weight-bold"><?= $bulan ?></span> Tahun <span class="font-weight-bold"><?= $tahunf ?></span>
                <?php else : ?>
                    Data Kosong Atau Tidak Dapat Di Temukan!
                <?php endif; ?>
            </div>
            <?php
            $jumlah_data = count($gaji);
            if ($jumlah_data > 0) {
            ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
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
                                                <th style="white-space: nowrap;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($gaji as $row) : ?>
                                                <tr>
                                                    <td style="white-space: nowrap;"><?= $no++; ?></td>
                                                    <td style="white-space: nowrap;"><?= $bulan; ?></td>
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
                                                    <td>
                                                        <div class="d-flex justify-content-center mb-2">
                                                            <a class="btn btn-sm btn-danger" href="<?= base_url('hapusdatagaji/' .  $row['id_gaji']) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i></a>
                                                        </div>
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
            text: '<?= implode('<br>', session('errors')) ?>' // Convert array to string
        });
    <?php endif; ?>
</script>