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
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?php echo base_url('prosestambahdatajabatan'); ?>" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Jabatan</label>
                            <input type="text" class="form-control" name="nama_jabatan">
                        </div>
                        <div class="form-group">
                            <label>Gaji Pokok</label>
                            <input type="text" class="form-control" name="gaji_pokok">
                        </div>
                        <div class="form-group">
                            <label>Tunjangan Transportasi</label>
                            <input type="text" class="form-control" name="tj_transport">
                        </div>
                        <div class="form-group">
                            <label>Uang Makan</label>
                            <input type="text" class="form-control" name="uang_makan">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                    
                       
            
                </form>

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>