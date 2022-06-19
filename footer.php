</div><!--/. container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->



<footer class="main-footer text-sm" style='background:#121212;'>
<strong>Copyright © 2022 <a href="/" style='color:white'>TOPSOCIAL</a>.</strong>
All rights reserved.

</footer>
<div id="sidebar-overlay"></div></div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="./vendor/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="./vendor/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="./vendor/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="./vendor/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="./vendor/dist/js/demo.js"></script>

<!-- PAGE ./vendor/plugins -->
<!-- jQuery Mapael -->
<script src="./vendor/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="./vendor/plugins/raphael/raphael.min.js"></script>
<script src="./vendor/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="./vendor/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="./vendor/plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="./vendor/dist/js/pages/dashboard2.js"></script>



<!-- DataTables -->
<script src="./vendor/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="./vendor/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="./vendor/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="./vendor/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>


<script>

$(document).ready(function(){
document.getElementById("rent_reciept").style.display = "none";
document.getElementById("landlord_name").style.display = "none";
document.getElementById("landlord_pone").style.display = "none";
document.getElementById("house_doc").style.display = "none";
document.getElementById("nok_name").style.display = "none";
document.getElementById("nok_phoneNumber").style.display = "none";
          });

$(function () {
$("#korepedatatable").DataTable({
"responsive": true,
"autoWidth": false,
});

$('#ffdd').DataTable({
"paging": true,
"lengthChange": true,
"searching": true,
"ordering": true,
"info": true,
"autoWidth": false,
"responsive": true,
});
});

</script>

</body></html>
