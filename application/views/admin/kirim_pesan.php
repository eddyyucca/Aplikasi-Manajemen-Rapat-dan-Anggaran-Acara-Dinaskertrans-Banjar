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
                                <h4 class="card-title">Kirim Pesan</h4>
                               <form action="<?php echo base_url('admin/send_msg') ?>" method="post">
                                    <div class="form-group row">
                                       
                                        <div class="col-sm-9">
                                            
                                            <input type="hidden" name="id_surat" value="<?= $surat['id_surat'] ?>">
                                        </div>
                                    </div>
                                      <div class="form-group row">
                                        <label for="notulensi" class="col-sm-3 text-right control-label col-form-label">No Telepon</label>
                                        <div class="col-sm-9">
                                             <input type="number" maxlength="12" class="form-control" name="no_telepon">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="notulensi" class="col-sm-3 text-right control-label col-form-label">Isi Pesan</label>
                                        <div class="col-sm-9">
                                            <textarea rows="15" class="form-control" id="pesan" name="pesan" placeholder=""></textarea>
                                     
                                        </div>
                                    </div>

                                  
                                    <div class="border-top">
                                        <div class="card-body">
                                            <a href="<?= base_url('admin/surat_keluar') ?>" class="btn btn-success">Batal</a>
                                            <button type="submit" name="masuk" class="btn btn-primary float-right">Kirim</button>
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