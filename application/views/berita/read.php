<div class="album py-5 bg-light">
    <div class="container">

        <div class="row judul">
            <div class="col-md-12 text-center">
                <h1><?php echo $title ?></h1>
            </div>
        </div>
        <div class="row artikel">
            <div class="col-md-8">
                <p><img src="<?php echo base_url('assets/upload/image/' . $berita->gambar) ?>" alt="<?php echo $berita->judul_berita ?>" class="img img-thumbnail img-responsive"></p>
                <?php echo $berita->isi_berita ?>
            </div>
            <div class="col-md-4">
                <aside>
                    <h3>Berita lainnya:</h3>
                    <ul>
                        <?php foreach ($listing as $listing) { ?>
                            <li><a href="<?php echo base_url('berita/read/' . $listing->slug_berita) ?>"><?php echo $listing->judul_berita ?></a></li>
                        <?php } ?>
                    </ul>
                </aside>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>