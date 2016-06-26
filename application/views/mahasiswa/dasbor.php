<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Statistik Mahasiswa
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('mahasiswa/dasbor');?>"><i class="fa fa-dashboard"></i>Dasbor</a></li>
    <li class="active">Statistik Mahasiswa</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
          <!-- Apply any bg-* class to to the icon to color it -->
          <span class="info-box-icon bg-green"><i class="fa fa-check-square-o"></i></span>
          <div class="info-box-content">
              <span class="info-box-text"><a href="<?php echo site_url('mahasiswa/skkm'); ?>">skkm valid</a></span>
              <span class="info-box-number">
                <?php
                $number = 0;
                $str = "poin";
                if ($skkm_valid == NULL): ?>
                    <?php echo $number.' '.$str; ?>
                  <?php else: ?>
                    <?php echo $skkm_valid.' '.$str; ?>
                <?php endif; ?>
              </span>
          </div>
          <!-- /.info-box-content -->
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
          <!-- Apply any bg-* class to to the icon to color it -->
          <span class="info-box-icon bg-red"><i class="fa fa-times-circle-o"></i></span>
          <div class="info-box-content">
              <span class="info-box-text"><a href="<?php echo site_url('mahasiswa/skkm'); ?>">skkm tidak valid</a></span>
              <span class="info-box-number">
                <?php
                $number = 0;
                $str = "poin";
                if ($skkm_tidak_valid == NULL): ?>
                    <?php echo $number.' '.$str; ?>
                  <?php else: ?>
                    <?php echo $skkm_tidak_valid.' '.$str; ?>
                <?php endif; ?>
              </span>
          </div>
          <!-- /.info-box-content -->
      </div>
    </div>
  </div>
</section><!-- /.content -->
