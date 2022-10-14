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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <ul class="nav nav-pills">
                                    
                                </ul>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Data Honorarium Rapat</h5>
                                <?= $this->session->flashdata('pesan'); ?>
                                <div class="tab-content">
                                    <div class="active tab-pane" id="masuk">
                                        <div class="table-responsive">
                                            <table id="zero_config" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>No</th>
                                                        <th>No Surat</th>
                                                        <th>No Honor</th>
                                                        <th>Tgl Honor</th>
                                                        <th>Nominal</th>
                                                        <th>Jumlah Penerima</th>
                                                        <th> 
                                                            <i class="mdi mdi-settings"></i>
                                                        </th>
                                                        <th>Upload</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1 ?>
                                                    <?php foreach($honor as $m): ?>
                                                    <tr>
                                                        <td><?= $i ?></td>
                                                        <td><?= $m['no_surat'] ?></td>
                                                        <td><?= $m['no_honor'] ?></td>
                                                        <td style="width: 13%"><?= date('d M-Y', strtotime($m['tgl_honor'])) ?></td>
                                                        <td>Rp. <?= number_format($m['nominal'], 2, ".", ",")  ?></td>
                                                        <td><?= $m['jml_penerima'] ?></td>
                                                        <td class="text-center">
                                                            <a href="<?= base_url('admin/edit_honor/') ?><?= $m['id_honor'] ?>" class="btn btn-success btn-xs" >
                                                                <i class="mdi mdi-pencil"></i> Edit
                                                            </a>
                                                            <br>
                                                            <a href="<?= base_url('admin/hapus_honor/') ?><?= $m['id_honor'] ?>" class="btn btn-danger btn-xs"  onclick="return confirm('yakin dihapus?');">
                                                                </i><i class="mdi mdi-delete-empty"></i> Hapus
                                                            </a>
                                                            <br>
                                                            <a href="<?= base_url('admin/fpdf_honor/') ?><?= $m['id_honor'] ?>" class="btn btn-primary btn-xs" >
                                                                <i class="mdi mdi-download"></i> Cetak
                                                            </a>
                                                        </td>
                                                        <td class="text-center">
                                                            <a class="image-popup-vertical-fit el-link" href="<?= base_url('./honor/') ?><?= $m['bukti']; ?>"><?= $m['bukti']?></a>
                                                            <br>
                                                            <small>
                                                                <a href="<?= base_url('admin/tambah_bukti/') ?><?= $m['id_honor'] ?>" class="btn btn-info btn-xs" >
                                                                    </i><i class="mdi mdi-upload"></i> Upload Bukti 
                                                                </a>
                                                            </small>
                                                        </td>
                                                    </tr>
                                                    <?php $i++ ?>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                                </div>

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