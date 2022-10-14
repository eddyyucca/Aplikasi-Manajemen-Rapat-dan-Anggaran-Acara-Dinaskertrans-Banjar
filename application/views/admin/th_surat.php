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
                                <form action="" method="post">
                                <div class="form-group row">
                                    <label for="jenis" class="col-sm-3 text-right control-label col-form-label">Jenis Surat :</label>
                                    <div class="col-md-9">
                                        <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="jenis" id="jenis">
                                            <option> </option>
                                            <option value="masuk">Surat Masuk</option>
                                            <option value="keluar">Surat Keluar</option>
                                        </select>
                                    </div>
                                </div>
                                </form>
                                <div class="jenis">

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
<script type="text/javascript">
	$(document).ready(function(){
		$('#jenis').on('change', function(){
			var jenis = $('#jenis').val();
			$.ajax({
			    type: 'POST',
			    url: '<?= base_url('admin/tampil_th_surat') ?>',
			    data: { 'jenis' : jenis },
				success: function(data){
				    $(".jenis").html(data);
				}
			})
		})
	})
</script>