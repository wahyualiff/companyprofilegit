<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->
<div class="container marketing">
    <div class="row judul">
        <div class="col-md-12 text-center">
            <h1><?php echo $title ?></h1>
        </div>
    </div>

    <!-- Three columns of text below the carousel -->
    <div class="row">
        <div class="col-lg-5">
            <img class="img img-responsive img-thumbnail" src="<?php echo base_url('assets/upload/image/' . $layanan->gambar) ?>" alt="<?php echo $title ?>">
        </div><!-- /.col-lg-5 -->

        <div class="col-lg-7">
            <p><strong>Harga mulai dari: Rp. <?php echo number_format($layanan->harga, '0', ',', '.') ?></strong></p>
            <hr>
            <?php echo $layanan->isi_layanan ?>
        </div><!-- /.col-lg-7 -->
        <div class="clearfix"></div>
    </div><!-- /.row -->
    <br><br><br>
</div>