
                    <!-- Form -->
                    <form class="form-horizontal m-t-20" action="" method="post">
                        <div class="row p-b-30">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" placeholder="NIP" aria-label="NIP" aria-describedby="basic-addon1" name="nip" value="<?= set_value('nip'); ?>" autofocus>
                                </div>
                                <?= form_error('nip','<small class="text-danger pl-3">','</small>'); ?>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-primary text-white" id="basic-addon1"><i class="ti-write"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" placeholder="Nama" aria-label="Nama" aria-describedby="basic-addon1" name="nama" value="<?= set_value('nama'); ?>" autofocus>
                                </div>
                                <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" name="password">
                                </div>
                                <?= form_error('password','<small class="text-danger pl-3">','</small>'); ?>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-info text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" class="form-control form-control-lg" placeholder=" Confirm Password" aria-label="Password" aria-describedby="basic-addon1" name="password_r">
                                </div>
                                <?= form_error('password_r','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="p-t-20">
                                        <a href="<?= base_url('auth'); ?>" class="btn btn-info" ><i class="fas fa-chevron-left m-r-5"></i> Back to login</a>
                                        <button class="btn btn-success float-right" type="submit" name="register">Register</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>