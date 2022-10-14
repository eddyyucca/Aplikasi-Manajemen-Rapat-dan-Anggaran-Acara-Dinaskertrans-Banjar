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
                                    <li class="nav-item"><a class="nav-link active"  href="#masuk" data-toggle="tab">Surat Masuk</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Data Surat Undangan Rapat <?= $user['bagian'] ?></h5>
                                <?= $this->session->flashdata('pesan'); ?>
                                <div class="tab-content">
                                    <div class="active tab-pane" id="masuk">
                                        <div class="table-responsive">
                                            <table id="zero_config" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>No Surat</th>
                                                        <th>Tanggal</th>
                                                        <th>Perihal</th>
                                                        <th>Catatan</th>
                                                        <th>Lampiran</th>
                                                        <th> 
                                                            <i class="mdi mdi-settings"></i>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($surat as $s): ?>
                                                    <tr>
                                                        <td><?= $s['no_surat'] ?></td>
                                                        <td style="width: 13%"><?= date('d M-Y', strtotime($s['tanggal'])) ?></td>
                                                        <td><?= $s['perihal'] ?></td>
                                                        <td><?= $s['catatan'] ?></td>
                                                        <td>
                                                            <a class="image-popup-vertical-fit el-link" href="<?= base_url('./surat/Masuk/') ?><?= $s['lampiran']; ?>"><?= $s['lampiran']?></a>
                                                        </td>
                                                        <td class="text-center">
                                                            <?php $tgl = date('Y-m-d',now()); ?>
                                                            <?php if((!empty($s['notulensi'])) AND ($s['tanggal'] <= $tgl)): ?>
                                                                <a href="<?= base_url('admin/fpdf_notulen/') ?><?= $s['id_surat'] ?>" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Download Notulensi">
                                                                    </i><i class="mdi mdi-download"></i>
                                                                </a>
                                                            <?php else : ?>
                                                                <a href="#" class="btn btn-danger btn-xs disabled" data-toggle="tooltip" data-placement="top" title="Download Notulensi">
                                                                    </i><i class="mdi mdi-download"></i>
                                                                </a>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
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