<!-- Footer -->
<!-- <footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2021</span>
        </div>
    </div>
</footer> -->
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>
<script src="<?= base_url('assets/') ?>js/tempus-dominus.js"></script>
<script src="<?= base_url('assets/') ?>js/moment.js"></script>
<script src="<?= base_url('assets/') ?>js/custom.js"></script>
<script src="<?= base_url('assets/') ?>js/bootstrap-select.min.js"></script>
<script src="<?= base_url('assets/') ?>js/flatpickr.js"></script>
<script src="<?= base_url('assets/') ?>js/theia-sticky-sidebar.min.js"></script>

<script src="<?= base_url('assets/') ?>js/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url('assets/') ?>js/moment.min.js"></script>
<script src="<?= base_url('assets/') ?>daterangepicker/daterangepicker.js"></script>


<!-- Page level plugins -->
<script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/') ?>js/chart.js"></script>
<script src="<?= base_url('assets/') ?>js/chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/') ?>js/demo/datatables-demo.js"></script>


<?php
if (isset($content_scripts)) {
    foreach ($content_scripts as $path) :

        $path = preg_match('/http/', $path) ? $path : base_url() . $path;
        echo '<script src="' . $path . '"></script>';

    endforeach;
}
?>

<!-- Flatpickr -->
<script>
    config = {
        enableTime: true,
        // noCalendar: true,
        dateFormat: "Y-m-d H:i",
        time_24hr: true,
        minDate: '<?= $dates ?>',
        maxDate: '<?= $max_date ?>'
    };
    console.log('<?= $dates ?>');
    flatpickr("#time", config);
</script>

</body>

</html>