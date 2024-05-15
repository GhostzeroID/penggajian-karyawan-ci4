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
            <div class="card card-primary" style="width:60%;">
                <div class="card-header">
                    <h3 class="card-title">Edit Data Jabatan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?php echo base_url('proseseditdatajabatan');?>" method="post">
                    <div class="card-body">
                        <input type="hidden" name="id_jabatan" value="<?php echo $jabatan['id_jabatan']; ?>">

                        <div class="form-group">
                            <label>Nama Jabatan</label>
                            <input type="text" class="form-control" name="nama_jabatan" value="<?php echo $jabatan['nama_jabatan']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Gaji Pokok</label>
                            <input type="text" class="form-control" name="gaji_pokok" value="<?php echo $jabatan['gaji_pokok']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Tunjangan Transportasi</label>
                            <input type="text" class="form-control" name="tj_transport" value="<?php echo $jabatan['tj_transport']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Uang Makan</label>
                            <input type="text" class="form-control" name="uang_makan" value="<?php echo $jabatan['uang_makan']; ?>">
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
