<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Statistik UP2KK</h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('up2kk/dasbor');?>"><i class="fa fa-dashboard"></i>Dasbor</a></li>
    <li class="active">Statistik UP2KK</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
          <!-- Apply any bg-* class to to the icon to color it -->
          <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
          <div class="info-box-content">
              <span class="info-box-text">jumlah mahasiswa</span>
              <span class="info-box-number">
                <?php echo $count_mahasiswa; ?>
              </span>
          </div>
          <!-- /.info-box-content -->
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
          <!-- Apply any bg-* class to to the icon to color it -->
          <span class="info-box-icon bg-green"><i class="fa fa-check-square-o"></i></span>
          <div class="info-box-content">
              <span class="info-box-text"><a href="<?php echo site_url('up2kk/validasi'); ?>">skkm valid</a></span>
              <span class="info-box-number">
                <?php echo $count_valid; ?>
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
              <span class="info-box-text"><a href="<?php echo site_url('up2kk/validasi'); ?>">skkm tidak valid</a></span>
              <span class="info-box-number">
                <?php echo $count_non_valid; ?>
              </span>
          </div>
          <!-- /.info-box-content -->
      </div>
    </div>
  </div>
</section><!-- /.content -->
