<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <form class="form-horizontal" method="post" action="<?= base_url('admin/tambah_pegawai') ?>">
                                <div class="card-body">
                                    <h4 class="card-title">Tambah ID ACCOUNT</h4>
                                    <div class="form-group row">
                                        <label for="nip" class="col-sm-3 text-right control-label col-form-label">NIP</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nip" placeholder="NIP" name="nip" autofocus>
                                            <?= form_error('nip','<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-3 text-right control-label col-form-label">Nama</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                                            <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="bagian" class="col-sm-3 text-right control-label col-form-label">Bagian</label>
                                        <div class="col-sm-9">
                                            <select class="select2 form-control custom-select" style="width: 100%; height:36px;" id="bagian" name="bagian">
                                                <option> </option>
                                                <?php foreach($bagian as $b): ?>
                                                <option value="<?= $b; ?>"><?= $b; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?= form_error('bagian','<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-3 text-right control-label col-form-label">Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="kata Sandi">
                                            <?= form_error('password','<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password_r" class="col-sm-3 text-right control-label col-form-label">Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" id="password_r" name="password_r" placeholder="Konfirmasi Kata Sandi">
                                            <?= form_error('password_r','<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            