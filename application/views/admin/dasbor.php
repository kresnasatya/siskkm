<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Statistik Admin</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('admin/dasbor');?>"><i class="fa fa-dashboard"></i>Dasbor</a></li>
      <li class="active">Statistik Admin</li>
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
                <span class="info-box-text"><a href="<?php echo site_url('admin/users'); ?>">user terdaftar</a></span>
                <span class="info-box-number"><?php echo $count_user; ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <!-- Apply any bg-* class to to the icon to color it -->
            <span class="info-box-icon bg-red"><i class="fa fa-newspaper-o"></i></span>
            <div class="info-box-content">
                <span class="info-box-text"><a href="<?php echo site_url('admin/pengumuman'); ?>">pengumuman</a></span>
                <span class="info-box-number"><?php echo $count_pengumuman; ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <!-- Apply any bg-* class to to the icon to color it -->
            <span class="info-box-icon bg-green"><i class="fa fa-files-o"></i></span>
            <div class="info-box-content">
                <span class="info-box-text"><a href="<?php echo site_url('admin/jenis'); ?>">jenis</a></span>
                <span class="info-box-number"><?php echo $count_jenis; ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <!-- Apply any bg-* class to to the icon to color it -->
            <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>
            <div class="info-box-content">
                <span class="info-box-text"><a href="<?php echo site_url('admin/tingkat'); ?>">tingkat </a></span>
                <span class="info-box-number"><?php echo $count_tingkat; ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <!-- Apply any bg-* class to to the icon to color it -->
            <span class="info-box-icon bg-aqua"><i class="fa fa-files-o"></i></span>
            <div class="info-box-content">
                <span class="info-box-text"><a href="<?php echo site_url('admin/prestasi'); ?>">prestasi</a></span>
                <span class="info-box-number"><?php echo $count_prestasi; ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
      </div>
    </div>
    <!-- /.info-box -->
</section>
<!-- /.content -->
