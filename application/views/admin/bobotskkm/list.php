<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Data Bobot SKKM
    <small>kelola data Bobot SKKM di sini</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('admin/beranda'); ?>"><i class="fa fa-home"></i> Beranda</a></li>
    <li><a href="<?php echo site_url('admin/pengumuman'); ?>"> Menu Bobot SKKM</a></li>
    <li class="active">Data Bobot SKKM</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <!-- Jenis -->
      <div class="box box-default collapsed-box">
        <div class="box-header with-border">
          <h3 class="box-title">Data Jenis</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
          </div>
          <!-- /.box-tools -->
        </div>
        <div class="box-body">
          <div class="col-md-4">
            <a href="" class="btn btn-primary">Tambah Jenis</a>
          </div>
          <div class="col-md-4 text-center">
              <div style="margin-top: 4px"  id="message">
                  <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
              </div>
          </div>
        </div>
      </div>
      <!-- End Jenis -->

      <!-- Tingkat -->
      <div class="box box-default collapsed-box">
        <div class="box-header with-border">
          <h3 class="box-title">Data Tingkat</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
          </div>
          <!-- /.box-tools -->
        </div>
        <div class="box-body">
          <div class="col-md-4">
            <a href="" class="btn btn-primary">Tambah Tingkat</a>
          </div>
          <div class="col-md-4 text-center">
              <div style="margin-top: 4px"  id="message">
                  <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
              </div>
          </div>
        </div>
      </div>
      <!-- End Tingkat -->

      <!-- Sebagai -->
      <div class="box box-default collapsed-box">
        <div class="box-header with-border">
          <h3 class="box-title">Data Sebagai</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
          </div>
          <!-- /.box-tools -->
        </div>
        <div class="box-body">
          <div class="col-md-4">
            <a href="" class="btn btn-primary">Tambah Sebagai</a>
          </div>
          <div class="col-md-4 text-center">
              <div style="margin-top: 4px"  id="message">
                  <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
              </div>
          </div>
        </div>
      </div>
      <!-- End Sebagai -->

    </div>
  </div>
</section><!-- /.content -->
