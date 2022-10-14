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
                                    <li class="nav-item"><a class="nav-link active"  href="#Kantor" data-toggle="tab">Kantor</a></li>
                                    <li class="nav-item"><a class="nav-link"  href="#Banjar" data-toggle="tab">Kab. Banjar</a></li>
                                    <li class="nav-item"><a class="nav-link"  href="#Provinsi" data-toggle="tab">Provinsi</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Data Surat Undangan Rapat</h5>
                                <?= $this->session->flashdata('pesan'); ?>
                                <div class="tab-content">
                                    <?php 
                                    $i = 2; 
                                    $a = '';
                                    ?>
                                    <?php foreach($tujuan as $t): ?>   
                                    <?php if($t == 'Kantor'){
                                            $a = 'active';
                                        }else{
                                            $a = '';
                                        }
                                    ?>                       
                                    <div class="<?= $a ?> tab-pane" id="<?= $t ?>">
                                        <div class="table-responsive">
                                            <table id="<?= $i ?>" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th style="width: 80px">No Surat dan Tanggal</th>
                                                        <th>Perihal</th>
                                                        <th style="width: 100px">Acara Rapat</th>
                                                        <th>Upload Surat</th>
                                                        <th>Daftar Hadir</th>
                                                        <th> 
                                                            <i class="mdi mdi-settings"></i>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        if ($t == "Banjar"){
                                                            $ta = "Kab. Banjar";
                                                        } elseif ($t == "Kantor") {
                                                            $ta = "Kantor";
                                                        } else {
                                                            $ta = "Provinsi";
                                                        }
                                                        $query = "SELECT * FROM tb_surat WHERE tujuan = '$ta' AND jenis_surat = 'Keluar'";
                                                        $keluar = $this->db->query($query)->result_array();
                                                    ?>
                                                    <?php foreach($keluar as $k): ?>
                                                    <tr>
                                                        <td><?= $k['no_surat'] ?>
                                                            <br>
                                                            <small>Tgl. <?= $k['tanggal'] ?></small>
                                                        </td>
                                                        <td><?= $k['perihal'] ?></td>
                                                        <td>Di <?= $k['tempat'] ?>
                                                            <br>
                                                            <small>Pada. <?= $k['tgl_acara'] ?></small>
                                                            <br>
                                                            <small>Pukul. <?= $k['waktu_acara'] ?> WITA</small>
                                                        </td>
                                                        <td class="text-center">
                                                            <a class="image-popup-vertical-fit el-link" href="<?= base_url('./surat/Keluar/') ?><?= $k['lampiran']; ?>"><?= $k['lampiran']?></a>
                                                            <br>
                                                            <small>
                                                                <a href="<?= base_url('admin/tambah_ttd/') ?><?= $k['id_surat'] ?>" class="btn btn-info btn-xs" >
                                                                    </i><i class="mdi mdi-upload"></i> Upload Surat 
                                                                </a>
                                                            </small>
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="<?= base_url('admin/fpdf_hadir/') ?><?= $k['id_surat'] ?>" class="btn btn-primary btn-xs" >
                                                                </i><i class="mdi mdi-download"></i> Daftar Hadir 
                                                            </a>
                                                            <a href="<?= base_url('admin/tambah_hadir/') ?><?= $k['id_surat'] ?>" class="btn btn-info btn-xs" >
                                                                </i><i class="mdi mdi-upload"></i> Upload Daftar Hadir 
                                                            </a>
                                                            <br>
                                                            <a class="image-popup-vertical-fit el-link" href="<?= base_url('./surat/Daftar-Hadir/') ?><?= $k['daftar_hadir']; ?>"><?= $k['daftar_hadir']?></a>
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="<?= base_url('admin/edit_keluar/') ?><?= $k['id_surat'] ?>" class="btn btn-success btn-xs" >
                                                                <i class="mdi mdi-pencil"></i> Edit
                                                            </a>
                                                            <a href="<?= base_url('admin/hapus_surat/') ?><?= $k['id_surat'] ?>" class="btn btn-danger btn-xs"  onclick="return confirm('yakin dihapus?');">
                                                                </i><i class="mdi mdi-delete-empty"></i> Hapus
                                                            </a>
                                                            <?php $tgl = date('Y-m-d',now()); ?>
                                                            <?php if(($k['tgl_acara'] <= $tgl)): ?>
                                                                <a href="<?= base_url('admin/notulen/') ?><?= $k['id_surat'] ?>" class="btn btn-info btn-xs" >
                                                                <i class="mdi mdi-book-plus"></i> Notulensi
                                                                </a>
                                                            <?php else: ?>
                                                                <a href="<?= base_url('admin/notulen/') ?><?= $k['id_surat'] ?>" class="btn btn-info btn-xs disabled" >
                                                                X
                                                                </a>
                                                            <?php endif; ?>
                                                             <?php if(($k['tgl_acara'] <= $tgl)): ?>
                                                                <a href="<?= base_url('admin/kirim_pesan/') ?><?= $k['id_surat'] ?>" class="btn btn-info btn-xs" >
                                                                <i class="mdi mdi-book-plus"></i> Notice SMS
                                                                </a>
                                                            <?php else: ?>
                                                                <a href="<?= base_url('admin/kirim_pesan/') ?><?= $k['id_surat'] ?>" class="btn btn-info btn-xs disabled" >
                                                                X
                                                                </a>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <?php $i++ ?>
                                    <?php endforeach; ?>
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