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
                            <div class="card-body">
                                <h4 class="card-title">Upload Surat</h4>
                                <?php echo form_open_multipart('admin/save_ttd'); ?>
                                <form class="form-horizontal" method="post" action="">
                                    <div class="form-group row">
                                        <div class="col-sm-9">
                                            <input type="hidden" name="no_surat" value="<?= $surat['no_surat'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="surat_ttd" class="col-sm-3 text-right control-label col-form-label">Surat</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" id="surat_ttd" name="surat_ttd">
                                            <?= form_error('surat_ttd','<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="border-top">
                                        <div class="card-body">
                                            <a href="<?= base_url('admin/surat_keluar') ?>" class="btn btn-success">Batal</a>
                                            <button type="submit" name="save_ttd" class="btn btn-primary float-right">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
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