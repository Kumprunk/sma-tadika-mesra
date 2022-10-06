<footer class="main-footer">
    <div class="footer-left">
        Copyright &copy; <?= date('Y'); ?> <div class="bullet"></div> <a href="https://bit.ly/3fCSPhG target="_blank">Kelompok 3</a>
    </div>
    <div class="footer-right">
        v.1.1.0
    </div>
</footer>
</div>
</div>

<!-- General JS Scripts -->
<script src="<?= base_url('assets/'); ?>modules/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>modules/popper.js"></script>
<script src="<?= base_url('assets/'); ?>modules/tooltip.js"></script>
<script src="<?= base_url('assets/'); ?>modules/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/'); ?>modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="<?= base_url('assets/'); ?>modules/moment.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/stisla.js"></script>

<!-- JS Libraies -->
<script src="<?= base_url('assets/'); ?>modules/simple-weather/jquery.simpleWeather.min.js"></script>
<script src="<?= base_url('assets/'); ?>modules/jqvmap/dist/jquery.vmap.min.js"></script>
<script src="<?= base_url('assets/'); ?>modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="<?= base_url('assets/'); ?>modules/summernote/summernote-bs4.js"></script>
<script src="<?= base_url('assets/'); ?>modules/codemirror/lib/codemirror.js"></script>
<script src="<?= base_url('assets/'); ?>modules/codemirror/mode/javascript/javascript.js"></script>
<script src="<?= base_url('assets/'); ?>modules/jquery-selectric/jquery.selectric.min.js"></script>
<script src="<?= base_url('assets/'); ?>modules/jquery.sparkline.min.js"></script>
<script src="<?= base_url('assets/'); ?>modules/jquery-ui/jquery-ui.min.js"></script>
<script src="<?= base_url('assets/'); ?>modules/chart.min.js"></script>
<script src="<?= base_url('assets/'); ?>modules/owlcarousel2/dist/owl.carousel.min.js"></script>
<script src="<?= base_url('assets/'); ?>modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
<script src="<?= base_url('assets/'); ?>modules/datatables/datatables.min.js"></script>
<script src="<?= base_url('assets/'); ?>modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>

<!-- Page Specific JS File -->
<script src="<?= base_url('assets/'); ?>js/page/index-0.js"></script>
<script src="<?= base_url('assets/'); ?>js/page/index.js"></script>
<script src="<?= base_url('assets/'); ?>js/page/modules-chartjs.js"></script>
<script src="<?= base_url('assets/'); ?>js/page/modules-datatables.js"></script>

<!-- Template JS File -->
<script src="<?= base_url('assets/'); ?>js/scripts.js"></script>
<script src="<?= base_url('assets/'); ?>js/custom.js"></script>

<!-- custom js datatables -->
<script>
    $(document).ready(function() {
        $('#datatables').DataTable({
            "ordering": false,
            "paging": true,
            "lengthChange": false,
        });
    });
    $(document).ready(function() {
        $('#datatables1').DataTable({
            "ordering": false,
        });
    });
    $(document).ready(function() {
        $('#datatables2').DataTable({
            "ordering": false,
        });
    });
    $(document).ready(function() {
        $('#datatables3').DataTable({
            "ordering": false,
            "paging": true,
            "lengthChange": true,
        });
    });
</script>

<!-- custom js menu active -->
<script>
    var path = location.pathname.split('/')
    // var url = location.origin + '/' + path[1]
    var url = location.origin + '/' + path[1] + '/' + path[2] + '/' + path[3]

    $('ul.sidebar-menu li a').each(function() {
        if ($(this).attr('href').indexOf(url) !== -1) {
            $(this).parent().addClass('active').parent().parent('li').addClass('active')
        }
    })
    // console.log(path)
</script>


</body>

</html>