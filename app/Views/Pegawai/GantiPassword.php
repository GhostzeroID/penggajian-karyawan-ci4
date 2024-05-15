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
                <!-- Change Password Form -->
                <form class="form-horizontal" action="<?= base_url('prosesgantipassword'); ?>" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputOldPassword">Password</label>
                            <input type="password" class="form-control" id="inputOldPassword" name="old_password" placeholder="Enter your old password">
                            <?php if (session()->getFlashdata('validation_errors.old_password')) : ?>
                                <div class="text-danger"><?= session()->getFlashdata('validation_errors.old_password') ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="inputNewPassword">Password Baru</label>
                            <input type="password" class="form-control" id="inputNewPassword" name="new_password" placeholder="Enter your new password">
                            <?php if (session()->getFlashdata('validation_errors.new_password')) : ?>
                                <div class="text-danger"><?= session()->getFlashdata('validation_errors.new_password') ?></div>
                            <?php endif; ?>
                        </div>
                        <?php if (session()->getFlashdata('error')) : ?>
                            <div class="alert alert-danger">
                                <?= session()->getFlashdata('error') ?>
                            </div>
                        <?php endif; ?>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info btn-block">Ganti Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>