<div class="album py-5 bg-light">
    <div class="container">
        <div class="row judul">
            <div class="col-md-12 text-center">
                <h1><?php echo $title ?></h1>
            </div>
        </div>
        <div class="row">

            <?php foreach ($berita as $berita) { ?>
                <div class="card">
                    <img src="<?php echo base_url('assets/upload/image/thumbs/' . $berita->gambar) ?>" alt="<?php echo $berita->judul_berita ?>">
                    <h2><a href="<?php echo base_url('berita/read/' . $berita->slug_berita) ?>"><?php echo $berita->judul_berita ?></a></h2>
                    <p class="card-text">
                        <?php echo strip_tags(character_limiter($berita->isi_berita, 200)) ?>
                    </p>
                    <p class="text-right"><a href="<?php echo base_url('berita/read/' . $berita->slug_berita) ?>" class="btn btn-sm btn-outline-primary">View</a></p>
                </div>
            <?php } ?>
            <div class="clearfix"></div>
        </div>
        <div class="row">
            <?php if (isset($paginasi) && $total > $limit) { ?>
                <div class="paginasi col-md-12 text-center">
                    <?php echo $paginasi; ?>
                    <div class="clearfix"></div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>