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
                    <h3 class="card-title">Tambah Data Absensi</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?= base_url('prosestambahdataabsensi'); ?>" method="post">
                    <div class="card-body">
                        <div class="form-group">
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
                        <div class="form-group">
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
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </section>
</div>