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
                                <?= $this->session->flashdata('pesan'); ?>
                                <div class="tab-content">
                                    <div class="active tab-pane" id="masuk">
                                        <div class="table-responsive">
                                            <table id="zero_config" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th style="width: 80px">No Surat dan Tanggal</th>
                                                        <th>Perihal</th>
                                                        <th>Pengirim</th>
                                                        <th style="width: 100px">Acara Rapat</th>
                                                        <th>Diteruskan</th>
                                                        <th>Lampiran</th>
                                                        <th> 
                                                            <i class="mdi mdi-settings"></i>
                                                        </th>
                                                        <!-- <th>Cetak</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($masuk as $m): ?>
                                                    <tr>
                                                        <td><?= $m['no_surat'] ?>
                                                            <br>
                                                            <small>Tgl. <?= $m['tanggal'] ?></small>
                                                        </td>
                                                        <!-- <td style="width: 13%"><?= date('d M-Y', strtotime($m['tanggal'])) ?></td> -->
                                                        <td><?= $m['perihal'] ?></td>
                                                        <td><?= $m['nm_pengirim'] ?></td>
                                                        <td>Di <?= $m['tempat'] ?>
                                                            <br>
                                                            <small>Pada. <?= $m['tgl_acara'] ?></small>
                                                            <br>
                                                            <small>Pukul. <?= $m['waktu_acara'] ?> WITA</small>
                                                        </td>
                                                        <td>
                                                            <a href="<?= base_url() ?>admin/diteruskan/<?= $m['id_surat']; ?>">lihat</a>
                                                        </td>
                                                        <td>
                                                            <a class="image-popup-vertical-fit el-link" href="<?= base_url('./surat/Masuk/') ?><?= $m['lampiran']; ?>"><?= $m['lampiran']?></a>
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="<?= base_url('admin/edit_masuk/') ?><?= $m['id_surat'] ?>" class="btn btn-success btn-xs" >
                                                                <i class="mdi mdi-pencil"></i> Edit
                                                            </a>
                                                            <br>
                                                            <a href="<?= base_url('admin/hapus_surat/') ?><?= $m['id_surat'] ?>" class="btn btn-danger btn-xs"  onclick="return confirm('yakin dihapus?');">
                                                                </i><i class="mdi mdi-delete-empty"></i> Hapus
                                                            </a>
                                                            <br>
                                                            <!-- <?php $tgl = date('Y-m-d',now()); ?>
                                                            <?php if(($m['tanggal'] <= $tgl)): ?>
                                                                <a href="<?= base_url('admin/notulen/') ?><?= $m['id_surat'] ?>" class="btn btn-info btn-xs" >
                                                                <i class="mdi mdi-library-plus"></i> Notulensi
                                                                </a>
                                                            <?php else: ?>
                                                                <a href="<?= base_url('admin/notulen/') ?><?= $m['id_surat'] ?>" class="btn btn-info btn-xs disabled" >
                                                                X
                                                                </a>
                                                            <?php endif; ?> -->
                                                        </td>
                                                        <!-- <td class="text-center">
                                                            <a href="<?= base_url('admin/fpdf/') ?><?= $m['no_surat'] ?>" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Disposisi">
                                                                </i><i class="mdi mdi-download"></i>  
                                                            </a>   
                                                        </td> -->
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- <div class="tab-pane" id="keluar">
                                        
                                        <ul class="nav nav-pills">
                                            <li class="nav-item"><a class="nav-link"  href="#Kantor" >Kantor</a></li>
                                            <li class="nav-item"><a class="nav-link"  href="#Banjar" >Kab. Banjar</a></li>
                                            <li class="nav-item"><a class="nav-link"  href="#Provinsi" >Provinsi</a></li>
                                        </ul>
                                        <br>
                                        <?php $ii = 2; ?>
                                        <?php foreach($tujuan as $t): 
                                            
                                            if ($t == "Banjar"){
                                                $ta = "Kab. Banjar";
                                            } elseif ($t == "Kantor") {
                                                $ta = "Kantor";
                                            } else {
                                                $ta = "Provinsi";
                                            }
                                            ?>
                                        <h5 id="<?= $t ?>">Surat Keluar (<?= $ta ?>)</h5>
                                        <div class="table-responsive">
                                            <table id="<?= $ii ?>" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>No Surat</th>
                                                        <th>Perihal</th>
                                                        <th>Dari</th>
                                                        <th>Tempat Acara</th>
                                                        <th>Tanggal Acara</th>
                                                        <th>Tujuan</th>
                                                        <th>Upload Surat</th>
                                                        <th> 
                                                            <i class="mdi mdi-settings"></i>
                                                        </th>
                                                        <th>Cetak</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $query = "SELECT * FROM tb_surat WHERE tujuan = '$ta' AND jenis_surat = 'Keluar'";
                                                        $keluar = $this->db->query($query)->result_array();
                                                    ?>
                                                    <?php foreach($keluar as $k): ?>
                                                    <tr>
                                                        <td><?= $k['no_surat'] ?></td>
                                                        <td><?= $k['perihal'] ?></td>
                                                        <td><?= $k['dari'] ?></td>
                                                        <td><?= $k['tempat'] ?></td>
                                                        <td><?= $k['tgl_acara'] ?></td>
                                                        <td class="text-success"><?= $k['tujuan'] ?></td>
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
                                                            <a href="<?= base_url('admin/edit_masuk/') ?><?= $k['id_surat'] ?>" class="btn btn-success btn-xs" >
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
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="<?= base_url('admin/fpdf/') ?><?= $k['id_surat'] ?>" class="btn btn-primary btn-xs" >
                                                                </i><i class="mdi mdi-download"></i> Disposisi
                                                            </a>
                                                            <a href="<?= base_url('admin/fpdf_hadir/') ?><?= $k['id_surat'] ?>" class="btn btn-primary btn-xs" >
                                                                </i><i class="mdi mdi-download"></i> Daftar Hadir 
                                                            </a>    
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <br>
                                        <?php $ii++; ?>
                                        <?php endforeach; ?>
                                    </div> -->
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