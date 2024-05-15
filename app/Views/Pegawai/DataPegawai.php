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
      <div class="row">
        <div class="col-12">
          <!-- /.card-header -->
          <?php foreach ($pegawai as $row) : ?>
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="<?= base_url('img/' . $row['photo']); ?>" alt="User profile picture" style="width: 150px; height: 150px; object-fit: cover;">
                </div>
                <h3 class="profile-username text-center"><?= $row['nama_pegawai']; ?></h3>

                <p class="text-muted text-center"><?= $row['jabatan']; ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Nik</b> <a class="float-right"><?= $row['nik']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Gender</b> <a class="float-right"><?= $row['jenis_kelamin']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Tanggal Lahir</b> <a class="float-right"><?= $row['tgl_lahir']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right"><?= $row['email']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Telpon</b> <a class="float-right"><?= $row['telpon'] ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Tanggal Masuk</b> <a class="float-right"><?= $row['tanggal_masuk']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Status</b> <a class="float-right"><?= $row['status']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Alamat</b> <a class="float-right"><?= $row['alamat']; ?></a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>

<!-- Include SweetAlert Script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>