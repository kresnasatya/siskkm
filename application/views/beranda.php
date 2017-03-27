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
        <div class="col-md-6">
            <h4>Tentang</h4>
            <div class="hline"></div>
            <p>
                Sistem ini dalam status pengembangan.
                Satuan Kredit Kegiatan Mahasiswa (SKKM) merupakan kredit poin yang harus dipenuhi oleh mahasiswa ketika
                menempuh pendidikan di kampus Politeknik Negeri Bali.
                Sistem ini ditujukan kepada mahasiswa untuk mengelola SKKM yang dimiliki dan UP2KK untuk memvalidasi
                SKKM.
            </p>
        </div>
        <div class="col-md-6">
            <h4>Pengumuman Terakhir</h4>
            <div class="hline"></div>
            <?php foreach ($pengumuman as $row): ?>
                <p>
                    <a href="<?php echo site_url('pengumuman/single/' . $row->id); ?>">
                        <?php echo $row->judul; ?></a>
                </p>
            <?php endforeach; ?>
        </div>

    </div>
    <!-- row -->
</div><!-- container -->

<div class="container mtb">
    <div class="row">
        <div class="col-md-12">
          <h4>Kritik dan Saran</h4>
          <?php echo $this->session->userdata('email_sent'); ?>
          <div class="hline"></div>
          <p>Pesan kamu sangat berarti bagi sistem ini.</p>
          <?php
          $attributes = array('role' => 'form');
          echo form_open('beranda/kirim_pesan', $attributes); ?>
          <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" name="nama" class="form-control" id="nama" required="">
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control" id="email" required="">
          </div>
          <div class="form-group">
              <label for="pesan">Pesan</label>
              <textarea class="form-control" name="pesan" id="pesan" rows="3" required=""></textarea>
          </div>
          <?php echo form_submit('submit', 'Kirim', 'class="btn btn-theme form-control"'); ?>
          <?php echo form_close(); ?>
        </div>
    </div>
    <!-- row -->
</div><!-- container -->
