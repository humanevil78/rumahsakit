<?php
require_once '_config/config.php';

if (!(isset($_SESSION['user']))) {
    echo "<script> window.location='" . baseUrl('auth/login.php') . "';</script>";
}
?>
</div><!-- /#page-wrapper -->

</div><!-- /#wrapper -->

<!-- JavaScript -->
<script src="<?= baseUrl('_assets/js/jquery-1.10.2.js'); ?>"></script>
<script src="<?= baseUrl('_assets/js/bootstrap.js'); ?>"></script>

<!-- Page Specific Plugins -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
<script src="<?= baseUrl('_assets/js/morris/chart-data-morris.js'); ?>"></script>
<script src="<?= baseUrl('_assets/js/tablesorter/jquery.tablesorter.js'); ?>"></script>
<script src="<?= baseUrl('_assets/js/tablesorter/tables.js'); ?>"></script>

</body>

</html>