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
                <form action="<?= base_url('proseseditdataabsensi'); ?>" method="post">
                    <div class="card-body">
                        <input type="hidden" name="id_kehadiran" value="<?= $kehadiran['id_kehadiran']; ?>">
                        <input type="hidden" name="bulan" value="<?= $kehadiran['bulan']; ?>">
                        <input type="hidden" name="tahun" value="<?= $kehadiran['tahun']; ?>">
                        <input type="hidden" name="nik" value="<?= $kehadiran['nik']; ?>">
                        <input type="hidden" name="nama_pegawai" value="<?= $kehadiran['nama_pegawai']; ?>">
                        <input type="hidden" name="jenis_kelamin" value="<?= $kehadiran['jenis_kelamin']; ?>">
                        <input type="hidden" name="nama_jabatan" value="<?= $kehadiran['nama_jabatan']; ?>">

                        <div class="form-group">
                            <label for="hadir">Hadir</label>
                            <input type="text" class="form-control" id="hadir" name="hadir" value="<?= $kehadiran['hadir']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="sakit">Sakit</label>
                            <input type="text" class="form-control" id="sakit" name="sakit" value="<?= $kehadiran['sakit']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="alpha">Alpha</label>
                            <input type="text" class="form-control" id="alpha" name="alpha" value="<?= $kehadiran['alpha']; ?>">
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
</script>
