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
            <a class="btn btn-sm btn-success" href="<?= base_url('tambahdatapegawai') ?>/"><i class="fas fa-plus"></i> Tambah Data</a>
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
                      <th style="white-space: nowrap;">No</th>
                      <th style="white-space: nowrap;">NIK</th>
                      <th style="white-space: nowrap;">Nama Pegawai</th>
                      <th style="white-space: nowrap;">Jenis Kelamin</th>
                      <th style="white-space: nowrap;">Tanggal Lahir</th>
                      <th style="white-space: nowrap;">Alamat</th>
                      <th style="white-space: nowrap;">No. Telpon</th>
                      <th style="white-space: nowrap;">Email</th>
                      <th style="white-space: nowrap;">Jabatan</th>
                      <th style="white-space: nowrap;">Tanggal Masuk</th>
                      <th style="white-space: nowrap;">Status</th>
                      <th style="white-space: nowrap;">Photo</th>
                      <th style="white-space: nowrap;">Hak Akses</th>
                      <th style="white-space: nowrap;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;
                    foreach ($pegawai as $row) : ?>
                      <tr>
                        <td style="white-space: nowrap;"><?= $no++; ?></td>
                        <td style="white-space: nowrap;"><?= $row['nik']; ?></td>
                        <td style="white-space: nowrap;"><?= $row['nama_pegawai']; ?></td>
                        <td style="white-space: nowrap;"><?= $row['jenis_kelamin']; ?></td>
                        <td style="white-space: nowrap;"><?= $row['tgl_lahir']; ?></td>
                        <td style="white-space: nowrap;"><?= $row['alamat']; ?></td>
                        <td style="white-space: nowrap;"><?= $row['telpon']; ?></td>
                        <td style="white-space: nowrap;"><?= $row['email']; ?></td>
                        <td style="white-space: nowrap;"><?= $row['jabatan']; ?></td>
                        <td style="white-space: nowrap;"><?= $row['tanggal_masuk']; ?></td>
                        <td style="white-space: nowrap;"><?= $row['status']; ?></td>
                        <td style="white-space: nowrap;"><img src="<?= base_url('img/' . $row['photo']); ?>" width="100px"></td>
                        <?php if ($row['hak_akses'] == '1') { ?>
                          <td>Admin</td>
                        <?php } else { ?>
                          <td>Pegawai</td>
                        <?php } ?>
                        <td>
                          <div class="d-flex justify-content-center mb-2">
                            <a class="btn btn-sm btn-primary mr-2" href="<?= base_url('editdatapegawai/' . $row['id_pegawai']) ?>"><i class="fas fa-edit"></i></a>
                            <a class="btn btn-sm btn-danger" href="<?= base_url('hapusdatapegawai/' .  $row['id_pegawai']) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i></a>
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

  <?php if (session()->has('errors')) : ?>
    <?php foreach (session('errors') as $error) : ?>
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '<?= $error ?>'
      });
    <?php endforeach; ?>
  <?php endif; ?>
</script>