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
                <form action="<?php echo base_url('prosestambahpotongan'); ?>" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Jabatan</label>
                            <select class="form-control" name="nama_jabatan" required>
                                <?php foreach ($jabatan as $row) : ?>
                                    <option value="<?php echo $row['nama_jabatan']; ?>"><?php echo $row['nama_jabatan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Hapus input hidden untuk jml_potongan_bpjsk, jml_potongan_bpjskk, dan jml_potongan_pph -->

                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>