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
                            <form class="form-horizontal" method="post" action="<?= base_url('admin/laporan_sk') ?>">
                                <div class="card-body">
                                    <h4 class="card-title">Cetak Laporan Surat Keluar</h4>
                                    <div class="form-group row">
                                        <label for="tujuan" class="col-sm-3 text-right control-label col-form-label">Tujuan</label>
                                        <div class="col-md-9">
                                            <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="tujuan" id="tujuan" autofocus>
                                                <option> </option>
                                                <?php foreach($tujuan as $t): ?>
                                                <option value="<?= $t ?>"><?= $t ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?= form_error('tujuan','<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tgl_awal" class="col-sm-3 text-right control-label col-form-label">Tanggal Awal</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" id="tgl_awal" name="tgl_awal" >
                                            <?= form_error('tgl_awal','<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tgl_akhir" class="col-sm-3 text-right control-label col-form-label">Tanggal Akhir</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir" >
                                            <?= form_error('tgl_akhir','<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-success" >Cetak</button>
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
            