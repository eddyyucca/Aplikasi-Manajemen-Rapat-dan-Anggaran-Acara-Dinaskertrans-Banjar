        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('admin'); ?>" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                          <?php if($this->session->userdata('role')=='admin'): ?>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Surat Undangan Rapat </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?= base_url('admin/tambah_surat_m'); ?>" class="sidebar-link"><i class="mdi mdi-table-row-plus-after"></i><span class="hide-menu"> Tambah Surat Masuk </span></a></li>
                                <li class="sidebar-item"><a href="<?= base_url('admin/tambah_surat_k'); ?>" class="sidebar-link"><i class="mdi mdi-table-row-plus-after"></i><span class="hide-menu"> Tambah Surat Keluar </span></a></li>  
                                <li class="sidebar-item"><a href="<?= base_url('admin/surat'); ?>" class="sidebar-link"><i class="mdi mdi-table"></i><span class="hide-menu"> Data Surat Masuk</span></a></li>
                                <li class="sidebar-item"><a href="<?= base_url('admin/surat_keluar'); ?>" class="sidebar-link"><i class="mdi mdi-table"></i><span class="hide-menu"> Data Surat Keluar </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">ID ACCOUNT </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?= base_url('admin/tambah_pegawai'); ?>" class="sidebar-link"><i class="mdi mdi-table-row-plus-after"></i><span class="hide-menu"> Tambah ID ACCOUNT </span></a></li>
                                <li class="sidebar-item"><a href="<?= base_url('admin/pegawai'); ?>" class="sidebar-link"><i class="mdi mdi-table"></i><span class="hide-menu"> Data ID ACCOUNT </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-cash-multiple"></i><span class="hide-menu">Honorarium </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?= base_url('admin/th_honor'); ?>" class="sidebar-link"><i class="mdi mdi-table-row-plus-after"></i><span class="hide-menu"> Tambah Honorarium </span></a></li>
                                <li class="sidebar-item"><a href="<?= base_url('admin/honor'); ?>" class="sidebar-link"><i class="mdi mdi-table"></i><span class="hide-menu"> Data Honorarium </span></a></li>
                            </ul>
                        </li>
                          <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="<?= base_url('admin/broadcast'); ?>" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Broadcast SMS</span></a></li> <?php endif; ?>
                          <?php if($this->session->userdata('role')=='kadis' or $this->session->userdata('role')=='admin'): ?>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-clipboard-arrow-down"></i><span class="hide-menu">Cetak Laporan </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?= base_url('admin/laporan_sm'); ?>" class="sidebar-link"><i class="mdi mdi-file"></i><span class="hide-menu"> Surat Masuk </span></a></li>
                                <li class="sidebar-item"><a href="<?= base_url('admin/laporan_sk'); ?>" class="sidebar-link"><i class="mdi mdi-file"></i><span class="hide-menu"> Surat Keluar </span></a></li>
                                <li class="sidebar-item"><a href="<?= base_url('admin/laporan_pegawai'); ?>" class="sidebar-link"><i class="mdi mdi-account-multiple"></i><span class="hide-menu"> ID ACCOUNT </span></a></li>
                                <li class="sidebar-item"><a href="<?= base_url('admin/laporan_pengirim'); ?>" class="sidebar-link"><i class="mdi mdi-contact-mail"></i><span class="hide-menu"> Pengirim Surat </span></a></li>
                                <li class="sidebar-item"><a href="<?= base_url('admin/laporan_honor'); ?>" class="sidebar-link"><i class="mdi mdi-cash-multiple"></i><span class="hide-menu"> Honorarium </span></a></li>
                                <li class="sidebar-item"><a href="<?= base_url('admin/laporan_notulen'); ?>" class="sidebar-link"><i class="mdi mdi-pencil-circle"></i><span class="hide-menu"> Notulensi </span></a></li>
                                <li class="sidebar-item"><a href="<?= base_url('admin/laporan_hadir'); ?>" class="sidebar-link"><i class="mdi mdi-playlist-check"></i><span class="hide-menu"> Daftar Hadir </span></a></li>
                                <!-- <li class="sidebar-item"><a href="<?= base_url('admin/laporan_dis'); ?>" class="sidebar-link"><i class="mdi mdi-file-document"></i><span class="hide-menu"> Rekap Disposisi </span></a></li> -->
                                <li class="sidebar-item"><a href="<?= base_url('admin/laporan_dispeg'); ?>" class="sidebar-link"><i class="mdi mdi-file-multiple"></i><span class="hide-menu"> Penerima Surat Masuk </span></a></li>
                                 <li class="sidebar-item"><a href="<?= base_url('admin/laporan_notice'); ?>" class="sidebar-link"><i class="mdi mdi-file-multiple"></i><span class="hide-menu"> Notice SMS </span></a></li>
                                
                                 <li class="sidebar-item"><a href="<?= base_url('admin/laporan_broadcast'); ?>" class="sidebar-link"><i class="mdi mdi-file-multiple"></i><span class="hide-menu"> Broadcast SMS </span></a></li>
                             <?php endif; ?>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->