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
                                <h4 class="card-title">Notulensi</h4>
                                <form class="form-horizontal" method="post">
                                    <div class="form-group row">
                                        <label for="no_surat" class="col-sm-3 text-right control-label col-form-label">Nomor Surat</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="no_surat" placeholder="Nomor Surat" name="no_suratH" value="<?= $surat['no_surat'] ?>" disabled>
                                            <input type="hidden" name="no_surat" value="<?= $surat['no_surat'] ?>">
                                        </div>
                                    </div>
                                   
                                    <div class="form-group row">
                                        <label for="notulensi" class="col-sm-3 text-right control-label col-form-label">Notulensi</label>
                                        <div class="col-sm-9">
                                            <textarea rows="15" class="form-control" id="notulensi" name="notulensi" placeholder=""><?= $surat['notulensi'] ?></textarea>
                                            <?= form_error('notulensi','<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <a href="<?= base_url('admin/fpdf_notulen/') ?><?= $surat['id_surat'] ?>" class="btn btn-danger float-right"></i><i class="mdi mdi-download"></i>Notulensi</a>
                                        </div>
                                    </div>
                                    <div class="border-top">
                                        <div class="card-body">
                                            <a href="<?= base_url('admin/surat_keluar') ?>" class="btn btn-success">Batal</a>
                                            <button type="submit" name="notulen" class="btn btn-primary float-right">Simpan</button>
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