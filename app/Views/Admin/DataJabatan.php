<!-- app/Views/admin/data_jabatan/index.php -->

<div class="content-wrapper" style="min-height: 651px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title; ?></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <div class="d-flex justify-content-start">
                        <a class="btn btn-sm btn-success" href="<?= base_url('tambahdatajabatan') ?>/"><i class="fas fa-plus"></i> Tambah Data</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- <div class="card-header">
                            <h3 class="card-title">Bordered Table</h3>
                        </div> -->
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Jabatan</th>
                                            <th>Gaji Pokok</th>
                                            <th>Tj. Transportasi</th>
                                            <th>Uang Makan</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($jabatan as $row) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $row['nama_jabatan']; ?></td>
                                                <td>Rp. <?= number_format($row['gaji_pokok'], 0, ',', '.'); ?></td>
                                                <td>Rp. <?= number_format($row['tj_transport'], 0, ',', '.'); ?></td>
                                                <td>Rp. <?= number_format($row['uang_makan'], 0, ',', '.'); ?></td>
                                                <td>Rp. <?= number_format($row['gaji_pokok'] + $row['tj_transport'] + $row['uang_makan'], 0, ',', '.'); ?></td>
                                                <td>
                                                    <div class="d-flex justify-content-center mb-2">
                                                        <a class="btn btn-sm btn-primary mr-2" href="<?= base_url('editdatajabatan/' . $row['id_jabatan']) ?>"><i class="fas fa-edit"></i></a>
                                                        <a class="btn btn-sm btn-danger" href="<?= base_url('hapusdatajabatan/' .  $row['id_jabatan']) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i></a>
                                                    </div>

                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /.content -->
</div>
<!-- Your existing HTML content -->

<!-- Include SweetAlert Script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    <?php if (session()->has('success')): ?>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '<?= session('success') ?>',
            showConfirmButton: false,
            timer: 1500
        });
    <?php endif; ?>

    <?php if (session()->has('errors')): ?>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '<?= session('errors') ?>'
        });
    <?php endif; ?>
</script>
