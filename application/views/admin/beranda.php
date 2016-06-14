<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Statistik Admin
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('admin/beranda');?>"><i class="fa fa-home"></i> Beranda</a></li>
    <li class="active">Statistik Admin</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <!-- Info boxes -->
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?php echo $jumlah_user; ?></h3>
            <p>
              User yang terdaftar
            </p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="<?php echo site_url('admin/users'); ?>" class="small-box-footer">Lebih lanjut <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <h3><?php echo $jumlah_pengumuman; ?></h3>
            <p>
              Pengumuman yang dibuat
            </p>
          </div>
          <div class="icon">
            <i class="ion ion-social-hackernews"></i>
          </div>
          <a href="<?php echo site_url('admin/pengumuman'); ?>" class="small-box-footer">Lebih lanjut <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
  <!-- /.boxes -->
</section><!-- /.content -->
