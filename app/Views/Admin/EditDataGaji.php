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
            <div class="card card-primary" style="width:60%;">
                <div class="card-header">
                    <h3 class="card-title">Edit Data Kehadiran</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?= base_url('proseseditdatagaji'); ?>" method="post">
                    <div class="card-body">
                        <input type="hidden" name="id_gaji" value="<?= $gaji['id_gaji']; ?>">
                        <input type="hidden" name="bulan" value="<?= $gaji['bulan']; ?>">
                        <input type="hidden" name="tahun" value="<?= $gaji['tahun']; ?>">
                        <input type="hidden" name="nik" value="<?= $gaji['nik']; ?>">
                        <input type="hidden" name="nama_pegawai" value="<?= $gaji['nama_pegawai']; ?>">
                        <input type="hidden" name="jenis_kelamin" value="<?= $gaji['jenis_kelamin']; ?>">
                        <input type="hidden" name="nama_jabatan" value="<?= $gaji['nama_jabatan']; ?>">
                        <input type="hidden" name="gaji_pokok" value="<?= $gaji['gaji_pokok']; ?>">
                        <input type="hidden" name="tj_transport" value="<?= $gaji['tj_transport']; ?>">
                        <input type="hidden" name="uang_makan" value="<?= $gaji['uang_makan']; ?>">

                        <div class="form-group">
                            <label for="pbpjsk">PBPJS Kesehatan</label>
                            <select class="form-control" id="pbpjsk" name="pbpjsk" required>
                                <?php foreach ($pot_gaji as $row) : ?>
                                    <option value="<?= ($row['potongan'] == 'Per Hari') ? '0' : $row['jml_potongan']; ?>" <?= ($gaji['pbpjsk'] == ($row['potongan'] == 'Per Hari' ? '0' : $row['jml_potongan'])) ? 'selected' : ''; ?>>
                                        <?= $row['potongan'] . ' - Rp. ' . number_format(($row['potongan'] == 'Per Hari') ? '0' : $row['jml_potongan'], 0, ',', '.'); ?> Menggunakan
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="pbpjskk">PBPJS Ketenagakerjaan</label>
                            <select class="form-control" id="pbpjskk" name="pbpjskk" required>
                                <?php foreach ($pot_gaji as $row) : ?>
                                    <option value="<?= ($row['potongan'] == 'Per Hari') ? '0' : $row['jml_potongan']; ?>" <?= ($gaji['pbpjskk'] == ($row['potongan'] == 'Per Hari' ? '0' : $row['jml_potongan'])) ? 'selected' : ''; ?>>
                                        <?= $row['potongan'] . ' - Rp. ' . number_format(($row['potongan'] == 'Per Hari') ? '0' : $row['jml_potongan'], 0, ',', '.'); ?> Menggunakan
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pph">PPh</label>
                            <select class="form-control" id="pph" name="pph" required>
                                <?php foreach ($pot_gaji as $row) : ?>
                                    <option value="<?= ($row['potongan'] == 'Per Hari') ? '0' : $row['jml_potongan']; ?>" <?= ($gaji['pph'] == ($row['potongan'] == 'Per Hari' ? '0' : $row['jml_potongan'])) ? 'selected' : ''; ?>>
                                        <?= $row['potongan'] . ' - Rp. ' . number_format(($row['potongan'] == 'Per Hari') ? '0' : $row['jml_potongan'], 0, ',', '.'); ?> Menggunakan
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="hidden" class="form-control" id="total_gaji" name="total_gaji" value="<?= $gaji['total_gaji']; ?>" readonly>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>


            </div>

        </div>
    </section>
</div>