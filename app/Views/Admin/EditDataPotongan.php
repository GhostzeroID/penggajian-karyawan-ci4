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
                <form action="<?php echo base_url('proseseditdatapotongan'); ?>" method="POST">
                    <div class="card-body">
                        <input type="hidden" name="id" value="<?php echo $pot_gaji['id']; ?>">
                        <div class="form-group">
                            <label>Potongan</label>
                            <input type="text" class="form-control" name="potongan" value="<?php echo $pot_gaji['potongan']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Potongan</label>
                            <input type="text" class="form-control" name="jml_potongan" value="<?php echo $pot_gaji['jml_potongan_bpjsk']; ?>" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                </form>

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>