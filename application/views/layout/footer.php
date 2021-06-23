<?php
// Site dari konfigurasi
$site_info = $this->konfigurasi_model->listing();
?>

<div class="clearfix"></div>
<!-- FOOTER -->

<footer class="footer">
    <div class="container">
        <p class="float-right"><a href="#top">Back to top</a></p>
        <p>&copy;
            <script>
                document.write(new Date().getFullYear())
            </script> Made with <i class="fa fa-heart"></i> by Muhamad Wahyu Alif &middot;
            <a href="#">Privacy</a> &middot;
            <a href="#">Terms</a>
        </p>
    </div>
</footer>

</body>
<!-- load javascript jquery -->
<script src="<?php echo base_url() ?>assets/template/jquery-ui/external/jquery/jquery.js" type="text/javascript"></script>
<!-- proper js -->
<script src="<?php echo base_url() ?>assets/template/bootstrap/assets/js/vendor/popper.min.js" type="text/javascript"></script>
<!-- load javascript bootstrap -->
<script src="<?php echo base_url() ?>assets/template/js/bootstrap.min.js" type="text/javascript"></script>
<!-- holder js -->
<script src="<?php echo base_url() ?>assets/template/bootstrap/assets/js/vendor/holder.min.js" type="text/javascript"></script>

</html>