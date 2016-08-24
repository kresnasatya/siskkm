<!-- Header -->
<div id="headerwrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h3>Sistem Informasi SKKM</h3>
                <h1>Politeknik Negeri Bali</h1>
                <h5>Versi 0.2.0 Beta</h5>
            </div>
        </div><!-- /row -->
    </div> <!-- /container -->
</div><!-- /headerwrap -->


<!-- *****************************************************************************************************************
 MIDDLE CONTENT
 ***************************************************************************************************************** -->

<div class="container mtb">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-1">
            <h4>Tentang SISKKM</h4>
            <p>
                Peringatan!!!<br>
                Sistem ini masih dalam status uji coba dan pengembangan. Belum siap untuk produksi.
                Satuan Kredit Kegiatan Mahasiswa (SKKM) merupakan kredit poin yang harus dipenuhi oleh mahasiswa ketika
                menempuh pendidikan di kampus Politeknik Negeri Bali.
                Sistem ini ditujukan kepada mahasiswa untuk mengelola SKKM yang dimiliki dan UP2KK untuk memvalidasi
                SKKM.
            </p>
            <p><br/><a href="<?php echo site_url('tentang'); ?>" class="btn btn-theme">Lebih Lanjut</a></p>
        </div>

        <div class="col-lg-3">
            <h4>Pos Terakhir</h4>
            <div class="hline"></div>
            <?php foreach ($pengumuman as $row): ?>
                <p>
                    <a href="<?php echo site_url('pengumuman/single/' . $row->id); ?>">
                        <?php echo $row->judul; ?></a>
                </p>
            <?php endforeach; ?>
        </div>

    </div>
    <! --/row -->
</div><! --/container -->
