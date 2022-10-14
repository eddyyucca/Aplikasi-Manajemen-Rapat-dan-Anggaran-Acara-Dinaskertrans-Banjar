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
                            <form class="form-horizontal" method="post" action="<?= base_url('admin/laporan_pengirim') ?>">
                                <div class="card-body">
                                    <h4 class="card-title">Cetak Laporan Pengirim Surat</h4>
                                    <div class="form-group row">
                                        <label for="id_pengirim" class="col-sm-3 text-right control-label col-form-label">Pilih Pengirim</label>
                                        <div class="col-sm-9">
                                            <select class="select2 form-control custom-select" style="width: 100%; height:36px;" id="id_pengirim" name="id_pengirim">
                                                <option> </option>
                                                <?php foreach($pengirim as $b): ?>
                                                <option value="<?= $b['id_pengirim']; ?>"><?= $b['nm_pengirim']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?= form_error('id_pengirim','<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-success">Cetak</button>
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
            