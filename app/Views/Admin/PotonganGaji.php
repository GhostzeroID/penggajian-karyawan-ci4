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
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <div class="d-flex justify-content-start">
                        <a class="btn btn-sm btn-success" href="<?= base_url('tambahdatapotongan') ?>/"><i class="fas fa-plus"></i> Tambah Data</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Jabatan</th>
                                            <th>BPJS Kesehatan</th>
                                            <th>BPJS Ketenagakerjaan</th>
                                            <th>Potongan Perhari</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($pot_gaji as $row) :
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $row['potongan']; ?></td>
                                                <td>Rp. <?= number_format($row['jml_potongan_bpjsk'], 0, ',', '.'); ?></td>
                                                <td>Rp. <?= number_format($row['jml_potongan_bpjskk'], 0, ',', '.'); ?></td>
                                                <td>Rp. <?= number_format($row['jml_potongan_pph'], 0, ',', '.'); ?></td>
                                                <td>
                                                    <div class="d-flex justify-content-center mb-2">
                                                        <!-- <a class="btn btn-sm btn-primary mr-2" href="<?= base_url('editdatapotongan/' . $row['id']) ?>"><i class="fas fa-edit"></i></a> -->
                                                        <a class="btn btn-sm btn-danger" href="<?= base_url('hapusdatapotongan/' .  $row['id']) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i></a>
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
    <?php if (session()->has('success')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '<?= session('success') ?>',
            showConfirmButton: false,
            timer: 1500
        });
    <?php endif; ?>
    <?php if (session()->has('errors') && is_array(session('errors'))) : ?>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '<?= implode('<br>', session('errors')) ?>'
        });
    <?php endif; ?>
</script>