<div class="album py-5 bg-light">
    <div class="container">

        <div class="row judul">
            <div class="col-md-12 text-center">
                <h1>Kantor Kami</h1>
            </div>
        </div>
        <div class="row artikel">
            <div class="col-md-12">
                <p>
                    <!-- Map dari Google Map -->
                    <?php echo $konfigurasi->map ?>
                </p>
            </div>
        </div>

        <div class="row artikel">
            <div class="col-md-12">
                <p>
                    <h4> <?php echo $konfigurasi->namaweb ?></h4>
                    <h6>Anda dapat menghubungi kami melalui alamat dibawah ini:</h6>
                    <br><i class="fa fa-map-marker"></i> <?php echo nl2br($konfigurasi->alamat) ?>
                    <br><i class="fa fa-phone"></i> <?php echo $konfigurasi->telepon ?>
                    <br><i class="fa fa-envelope"></i> <?php echo $konfigurasi->email ?>
                    <br><i class="fa fa-globe"></i> <?php echo $konfigurasi->website ?>
                </p>
                <hr>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
</div>