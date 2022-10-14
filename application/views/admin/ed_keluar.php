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
                                <h4 class="card-title">Edit Surat Undangan</h4>
                                <form class="form-horizontal" method="post">
                                    <div class="form-group row">
                                        <label for="no_surat" class="col-sm-3 text-right control-label col-form-label">Nomor Surat</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="no_surat" placeholder="Nomor Surat" name="no_suratH" value="<?= $surat['no_surat'] ?>" disabled>
                                            <input type="hidden" name="no_surat" value="<?= $surat['no_surat'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tanggal" class="col-sm-3 text-right control-label col-form-label">Tanggal</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $surat['tanggal'] ?>" autofocus>
                                            <?= form_error('tanggal','<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="perihal" class="col-sm-3 text-right control-label col-form-label">Perihal</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="perihal" placeholder="Perihal" name="perihal" value="<?= $surat['perihal'] ?>">
                                            <?= form_error('perihal','<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tempat" class="col-sm-3 text-right control-label col-form-label">Tempat Acara</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="tempat" placeholder="Tempat Acara" name="tempat" value="<?= $surat['tempat'] ?>">
                                            <?= form_error('tempat','<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="catatan" class="col-sm-3 text-right control-label col-form-label">Catatan</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" id="catatan" name="catatan"><?= $surat['catatan'] ?></textarea>
                                            <?= form_error('catatan','<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="border-top">
                                        <div class="card-body">
                                            <a href="<?= base_url('admin/surat_keluar') ?>" class="btn btn-success">Batal</a>
                                            <button type="submit" name="edit_masuk" class="btn btn-primary float-right">Simpan</button>
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