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
            <div class="card">
                <!-- form start -->
                <form action="<?php echo base_url('proseseditdatapegawai'); ?>" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <input type="hidden" name="id_pegawai" value="<?php echo $pegawai['id_pegawai']; ?>">
                        <div class="form-group">
                            <label>NIK</label>
                            <input type="text" class="form-control" name="nik" value="<?php echo $pegawai['nik']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Nama Pegawai</label>
                            <input type="text" class="form-control" name="nama_pegawai" value="<?php echo $pegawai['nama_pegawai']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" value="<?php echo $pegawai['username']?>">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" value="<?php echo $pegawai['password']?>">
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgl_lahir" value="<?php echo $pegawai['tgl_lahir']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" name="alamat"><?php echo $pegawai['alamat']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>No Telpon</label>
                            <input type="text" class="form-control" name="telpon" value="<?php echo $pegawai['telpon']; ?>">
                        </div>
                        <div class="form-group">
                            <label>email</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $pegawai['email']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="jenis_kelamin" value="Laki-Laki" id="laki_laki" <?php echo ($pegawai['jenis_kelamin'] == 'Laki-Laki') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="laki_laki">Laki-Laki</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="jenis_kelamin" value="Perempuan" id="perempuan" <?php echo ($pegawai['jenis_kelamin'] == 'Perempuan') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="perempuan">Perempuan</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" value="<?php echo $pegawai['jabatan']; ?>" name="jabatan">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_masuk">Tanggal Masuk</label>
                            <input type="date" class="form-control" name="tanggal_masuk" value="<?php echo $pegawai['tanggal_masuk']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" class="form-control" name="status" value="<?php echo $pegawai['status']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="akses">Hak Akses</label>
                            <select class="form-control" name="hak_akses">
                                <option value="<?php echo $pegawai['hak_akses']; ?>"></option>
                                <option value="1">Admin</option>
                                <option value="2">Pegawai</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input type="file" class="form-control" name="photo">
                            <p>Gambar Sebelumnya :</p>
                            <img src="<?= base_url('img/' . $pegawai['photo']); ?>" width="100px" style="margin-top:10px;" alt="Previous Photo">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>