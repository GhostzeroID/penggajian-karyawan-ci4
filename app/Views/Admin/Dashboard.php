<div class="content-wrapper" style="min-height: 651px;">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><?php echo $title; ?></h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->

      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php echo $pegawai; ?></h3>

              <p>Data Pegawai</p>
            </div>
            <div class="icon">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?php echo $jabatan; ?></h3>

              <p>Data Jabatan</p>
            </div>
            <div class="icon">
              <i class="fas fa-briefcase fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?php echo $gaji; ?></h3>
              <p>Data Gaji</p>
            </div>
            <div class="icon">
              <i class="fas fa-money-bill-wave fa-2x text-gray-300"></i>
            </div>
          </div>

        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?php echo $kehadiran; ?></h3>

              <p>Data Absensi</p>
            </div>
            <div class="icon">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- Admin/Dashboard.php -->