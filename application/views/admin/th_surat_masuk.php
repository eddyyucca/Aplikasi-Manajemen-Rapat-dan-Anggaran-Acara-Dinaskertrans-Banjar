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
                                <h4 class="card-title">Surat Masuk Undangan Rapat</h4>
                                <?= $this->session->flashdata('pesan'); ?>
                                <?php echo form_open_multipart('admin/tambah_surat_m'); ?>
                                <form class="form-horizontal" method="post">
                                    <div class="form-group row">
                                        <label for="id_pengirim" class="col-sm-3 text-right control-label col-form-label">Pengirim Surat</label>
                                        <div class="col-md-7">
                                            <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="id_pengirim" id="id_pengirim" autofocus>
                                                <option> </option>
                                                <?php foreach($pengirim as $t): ?>
                                                <option value="<?= $t['id_pengirim'] ?>"><?= $t['nm_pengirim'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?= form_error('id_pengirim','<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                        <a href="#" class="btn btn-info btn-xs col-md-2" data-toggle="modal" data-target="#th_pengirim"><i class="mdi mdi-plus-circle"></i> Pengirim</a>
                                    </div>
                                    <div class="form-group row">
                                        <label for="no_surat" class="col-sm-3 text-right control-label col-form-label">No Surat</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="no_surat" placeholder="Nomor Surat" name="no_surat" value="<?= set_value('no_surat') ?>" >
                                            <input type="hidden" name="jenis" value="Masuk">
                                            <?= form_error('no_surat','<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tanggal" class="col-sm-3 text-right control-label col-form-label">Tanggal Surat</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= set_value('tanggal') ?>">
                                            <?= form_error('tanggal','<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="perihal" class="col-sm-3 text-right control-label col-form-label">Perihal</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="perihal" placeholder="Perihal" name="perihal" value="<?= set_value('perihal') ?>">
                                            <?= form_error('perihal','<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tempat" class="col-sm-3 text-right control-label col-form-label">Tempat Acara</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="tempat" placeholder="Tempat Acara" name="tempat" value="<?= set_value('tempat') ?>">
                                            <?= form_error('tempat','<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tgl_acara" class="col-sm-3 text-right control-label col-form-label">Tanggal Acara</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" id="tgl_acara"  name="tgl_acara" value="<?= set_value('tgl_acara') ?>">
                                            <?= form_error('tgl_acara','<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="waktu_acara" class="col-sm-3 text-right control-label col-form-label">Waktu Acara</label>
                                        <div class="col-sm-9">
                                            <input type="time" class="form-control" id="waktu_acara"  name="waktu_acara" value="<?= set_value('waktu_acara') ?>">
                                            <?= form_error('waktu_acara','<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label">Diteruskan</label>
                                        <div class="col-md-9">
                                            <?php $ind = 1 ?>
                                            <?php foreach($pegawai as $p): ?>
                                            <div class="custom-control custom-checkbox mr-sm-2">
                                                <input type="checkbox" class="custom-control-input" id="customControlAutosizing<?= $ind ?>" name="terus[]" value="<?= $p['nip'] ?>">
                                                <label class="custom-control-label" for="customControlAutosizing<?= $ind ?>"><?= $p['bagian'] ?></label>
                                            </div>
                                            <?php $ind++ ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="catatan" class="col-sm-3 text-right control-label col-form-label">Catatan</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" id="catatan" name="catatan"></textarea>
                                            <?= form_error('catatan','<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lampiran" class="col-sm-3 text-right control-label col-form-label">Lampiran</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" id="lampiran" name="lampiran">
                                            <?= form_error('lampiran','<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="border-top">
                                        <div class="card-body">
                                            <button type="submit" name="tambah_surat_m" class="btn btn-primary">Simpan</button>
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

<!-- Modal -->
<div class="modal fade" id="th_pengirim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pengirim Surat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action="<?= base_url('admin/th_pengirim') ?>">
                    <div class="form-group row">
                        <label for="nm_pengirim" class="col-sm-3 text-right control-label col-form-label">Nama Pengirim</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nm_pengirim" placeholder="Nama Pengirim" name="nm_pengirim" value="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="alamat_pengirim" class="col-sm-3 text-right control-label col-form-label">Alamat Pengirim</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="alamat_pengirim" placeholder="Alamat Pengirim" name="alamat_pengirim" value="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="notelp_pengirim" class="col-sm-3 text-right control-label col-form-label">No Telp Pengirim</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="notelp_pengirim" placeholder="No Telp Pengirim" name="notelp_pengirim" value="">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
                </form>
        </div>
    </div>
</div>