            <footer class="footer text-center">
                <?php
                    $year = date('Y', now());
                ?>
                Ika Febrina Puspasari - Aplikasi Manajemen Rapat dan Anggaran Acara Dinaskertrans Banjar <?= $year ?>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?= base_url('assets/'); ?>assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url('assets/'); ?>assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url('assets/'); ?>assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?= base_url('assets/'); ?>assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<?= base_url('assets/'); ?>dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url('assets/'); ?>dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url('assets/'); ?>dist/js/custom.min.js"></script>
    <!-- This Page JS -->
    <script src="<?= base_url('assets/'); ?>assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <script src="<?= base_url('assets/'); ?>dist/js/pages/mask/mask.init.js"></script>
    <script src="<?= base_url('assets/'); ?>assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="<?= base_url('assets/'); ?>assets/libs/select2/dist/js/select2.min.js"></script>
    <script src="<?= base_url('assets/'); ?>assets/libs/quill/dist/quill.min.js"></script>
    <script src="<?= base_url('assets/'); ?>assets/extra-libs/DataTables/datatables.min.js"></script>
    <script src="<?= base_url('assets/'); ?>assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <script src="<?= base_url('assets/'); ?>assets/libs/magnific-popup/meg.init.js"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
        $('#2').DataTable();
        $('#3').DataTable();
        $('#4').DataTable();
    </script>
</body>

</html>