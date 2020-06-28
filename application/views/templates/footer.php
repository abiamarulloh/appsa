</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <?php if(date("Y", time())  == 2019 ): ?>
            <span>Copyright &copy; <?= $about_us['name_school']; ?> 2019, APPSA</span>
            <?php else : ?>
            <span>Copyright &copy; <?= $about_us['name_school']; ?> 2019 - <?= date("Y", time()); ?>, APPSA</span>
            <?php endif; ?>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar dari APPSA ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Sampai Jumpa di APPSA. :)</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
                <a class="btn btn-primary" href="<?= base_url('/auth/logout'); ?>">Keluar</a>
            </div>
        </div>
    </div>
</div>

<!-- JQuery -->
<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
<!-- Bootstrap tooltips -->
<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>-->
<!-- Bootstrap core JavaScript -->
<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>-->
<!-- MDB core JavaScript -->
<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/js/mdb.min.js"></script>-->

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url(); ?>/assets/sbadmin2/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>/assets/sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url(); ?>/assets/sbadmin2/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url(); ?>/assets/sbadmin2/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url(); ?>/assets/sbadmin2/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<!-- <script src="<?= base_url(); ?>/assets/sbadmin2/js/demo/chart-area-demo.js"></script>
<script src="<?= base_url(); ?>/assets/sbadmin2/js/demo/chart-pie-demo.js"></script> -->
<!-- Page level plugins -->
<script src="<?= base_url(); ?>/assets/sbadmin2/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>/assets/sbadmin2/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url(); ?>/assets/sbadmin2/js/demo/datatables-edit.js"></script>

<!-- MDB core JavaScript -->
<!-- <script  src="<?= base_url(); ?>/assets/MDB-Free/js/mdb.min.js"></script> -->

<script src="<?= base_url(); ?>/assets/datepicker/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript">


// Mutasi Check All and Check Item
$("#checkAll").change(function() {
    $(".checkItem").prop("checked", $(this).prop("checked"));
});

$(".checkItem").change(function() {
    if ($(this).prop("checked") == false) {
        $("#checkAll").prop("checked", false);
    }

    if ($(".checkItem:checked").length == $(".checkItem").length) {
        $("#checkAll").prop("checked", true)
    }
});


document.querySelector('.custom-file-input').addEventListener('change',function(e){
  var fileName = document.getElementById("customFile").files[0].name;
  var nextSibling = e.target.nextElementSibling
  nextSibling.innerText = fileName
})


$(document).ready(function() {

    $('.datepicker').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
    });

    $('.see-password').click(function() {
        var input = $(this).parent().parent().find("input")
        if (input.attr('type') == 'text') {
            input.attr('type', 'password')
        } else {
            input.attr('type', 'text')
        }
    });


});






// MUtasi

$('#mutasi').DataTable({
    "lengthMenu": [
        [-1],
        ["All"]
    ]
});



// Blocked klik kanan
var message = "";

function clickIE() {
    if (document.all) {
        (message);
        return false;
    }
}

function clickNS(e) {
    if (document.layers || (document.getElementById && !document.all)) {
        if (e.which == 2 || e.which == 3) {
            (message);
            return false;
        }
    }
}

if (document.layers) {
    document.captureEvents(Event.MOUSEDOWN);
    document.onmousedown = clickNS;
} else {
    document.onmouseup = clickNS;
    document.oncontextmenu = clickIE;
}

document.oncontextmenu = new Function("return false")
</script>


</body>

</html>