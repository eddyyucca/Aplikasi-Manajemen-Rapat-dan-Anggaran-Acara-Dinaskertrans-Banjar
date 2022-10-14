<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Dashboard, <?= $user['bagian'] ?></h4>
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
                    
                    <div class="col-lg-8">
                        
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title m-b-0">Manajemen Rapat dan Anggaran Biaya pada Dinas Tenaga Kerja dan Transmigrasi Kabupaten Banjar!</h4>
                            </div>
                            <ul class="list-style-none">
                                <?php foreach($surat as $s): ?>
                                <li class="d-flex no-block card-body">
                                    <?php if($s['jenis_surat'] == "Masuk"): ?>
                                        <i class="fa w-30px m-t-5 "><badge class="badge badge-danger"> in</badge></i>
                                    <?php else: ?>
                                        <i class="fa w-30px m-t-5 "><badge class="badge badge-success"> out</badge></i>
                                    <?php endif; ?>
                                    <div>
                                        <a class="m-b-0 font-medium p-0">Nomor Surat: <?= $s['no_surat'] ?> | Perihal : <?= $s['perihal'] ?></a>
                                        <span class="text-muted font-10"> <?= $s['catatan'] ?></span>
                                    </div>
                                    <div class="ml-auto">
                                        <div class="text-right">
                                            <h5 class="text-muted m-b-0"><?= date('d', strtotime($s['tanggal'])) ?></h5>
                                            <span class="text-muted font-16"><?= date('M-Y', strtotime($s['tanggal'])) ?></span>
                                        </div>
                                    </div>
                                </li>
                                <li class="border-top"></li>
                                <?php endforeach; ?>
                            </ul>
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
            