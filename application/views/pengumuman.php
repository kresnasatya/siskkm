<!-- *****************************************************************************************************************
 BLOG CONTENT
 ***************************************************************************************************************** -->

 <div class="container mtb" style="padding-top: 25px;">
  <div class="row">

    <! -- BLOG POSTS LIST -->
    <div class="col-lg-8">
      <! -- Blog Post 1 -->
      <?php foreach ($pengumuman as $row): ?>
        <a href="<?php echo site_url('pengumuman/'.$row->slug); ?>"><h3 class="ctitle"><?php echo $row->judul; ?></h3></a>
        <p><csmall>Posted: <?php echo $row->tanggal; ?></csmall> | <csmall2>Oleh: <?php echo $row->nama_depan.' '.$row->nama_belakang; ?></csmall2></p>
        <p><?php echo character_limiter($row->isi_pengumuman, 200); ?></p>
        <p><a href="<?php echo site_url('pengumuman/'.$row->slug); ?>">[Lanjut Baca]</a></p>
        <div class="hline"></div>
      <?php endforeach; ?>

      <div class="spacing"></div>
      <?php echo $this->pagination->create_links(); ?>
    </div>

    <! -- SIDEBAR -->
    <div class="col-lg-4">

      <h4>Daftar Pengumuman</h4>
      <div class="hline"></div>
        <ul class="popular-posts">
          <?php foreach ($daftar_pengumuman as $row): ?>
            <li>
              <p><a href="<?php echo site_url('pengumuman/'.$row->slug); ?>"><?php echo $row->judul; ?></a></p>
              <em>Posted on <?php echo $row->tanggal; ?></em>
            </li>
          <?php endforeach; ?>
        </ul>

    </div>
  </div><! --/row -->
 </div><! --/container -->
