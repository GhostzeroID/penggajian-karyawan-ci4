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
        <a class="btn btn-sm btn-success" href="<?= base_url('tambahdatakehadiran') ?>/"><i class="fas fa-plus"></i> Tambah Data Absensi</a>
      </div>
      <form method="post" action="<?= base_url('dataabsensi') ?>" style="margin-top:10px;">
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
          Menampilkan Data Kehadiran Pegawai Bulan <span class="font-weight-bold"><?= $bulan ?></span> Tahun <span class="font-weight-bold"><?= $tahunf ?></span>
        <?php else : ?>
          Data Kosong Atau Tidak Dapat Di Temukan!
        <?php endif; ?>
      </div>
      <?php
      $jumlah_data = count($kehadiran);
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
                        <th>No</th>
                        <th>Bulan</th>
                        <th>NIK</th>
                        <th>Nama Pegawai</th>
                        <th>Jenis Kelamin</th>
                        <th>Jabatan</th>
                        <th>Hadir</th>
                        <th>Izin</th>
                        <th>Alpha</th>
                        <th>Action</th>
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
                          <td>
                            <div class="d-flex justify-content-center mb-2">
                              <a class="btn btn-sm btn-primary mr-2" href="<?= base_url('editdataabsensi/' . $row['id_kehadiran']) ?>"><i class="fas fa-edit"></i></a>
                              <a class="btn btn-sm btn-danger" href="<?= base_url('hapusdataabsensi/' .  $row['id_kehadiran']) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i></a>
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
</script>