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
                                <h4 class="card-title">Honorarium Rapat</h4>
                                <form class="form-horizontal" method="post" action="">
                                    <div class="form-group row">
                                        <label for="id_surat" class="col-sm-3 text-right control-label col-form-label">Nomor Surat</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="id_surat" name="id_surat" value="<?= $honor['no_surat'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="no_honor" class="col-sm-3 text-right control-label col-form-label">Nomor Honor</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="no_honor"  name="no_honor" value="<?= $honor['no_honor'] ?>" autofocus>
                                            <?= form_error('no_honor','<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tgl_honor" class="col-sm-3 text-right control-label col-form-label">Tanggal</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" id="tgl_honor" name="tgl_honor" value="<?= $honor['tgl_honor'] ?>">
                                            <?= form_error('tgl_honor','<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nominal" class="col-sm-3 text-right control-label col-form-label">Nominal</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nominal"  name="nominal" value="<?= $honor['nominal'] ?>">
                                            <?= form_error('nominal','<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="jml_penerima" class="col-sm-3 text-right control-label col-form-label">Jumlah Penerima</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="jml_penerima"  name="jml_penerima" value="<?= $honor['jml_penerima'] ?>">
                                            <?= form_error('jml_penerima','<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="keterangan" class="col-sm-3 text-right control-label col-form-label">Catatan</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" id="keterangan" name="keterangan"><?= $honor['keterangan'] ?></textarea>
                                            <?= form_error('keterangan','<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="border-top">
                                        <div class="card-body">
                                            <a href="<?= base_url('admin/honor') ?>" class="btn btn-success "> Batal</a>
                                            <button type="submit" name="edit_honor" class="btn btn-primary">Simpan</button>
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
