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
          <div class="row">
            <div class="col-md-4">
              <a href="" class="btn btn-primary">Tambah Jenis</a>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
          </div>
          <br>
          <table id="jenistable" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Jenis Kegiatan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
                    $start = 0;
                    foreach ($jenis as $row): ?>
                    <tr>
                      <td><?php echo ++$start; ?></td>
                      <td><?php echo $row->jenis; ?></td>
                      <td><?php
                              $hapus = array(
                                        'class' => 'btn btn-sm btn-danger',
                                        'onclick' => 'javascript: return confirm(\'Kamu Yakin ?\')'
                                      );
                                      echo anchor(site_url('admin/bobotskkm/hapus_jenis/'.$row->id),'Hapus',$hapus);?></td>
                    </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
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
          <div class="row">
            <div class="col-md-4">
              <a href="" class="btn btn-primary">Tambah Tingkat</a>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
          </div>
          <br>
          <table id="tingkattable" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Jenis</th>
                <th>Tingkat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
                    $start = 0;
                    foreach ($tingkat as $row): ?>
                    <tr>
                      <td><?php echo ++$start; ?></td>
                      <td><?php echo $row->jenis; ?></td>
                      <td><?php echo $row->tingkat; ?></td>
                      <td><?php
                              $hapus = array(
                                        'class' => 'btn btn-sm btn-danger',
                                        'onclick' => 'javascript: return confirm(\'Kamu Yakin ?\')'
                                      );
                                      echo anchor(site_url('admin/bobotskkm/hapus_tingkat/'.$row->id_tingkat),'Hapus',$hapus);?></td>
                    </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
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
          <div class="row">
            <div class="col-md-4">
              <a href="" class="btn btn-primary">Tambah Sebagai</a>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
          </div>
          <br>
          <table id="sebagaitable" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Tingkat</th>
                <th>Sebagai</th>
                <th>Bobot</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
                    $start = 0;
                    foreach ($sebagai as $row): ?>
                    <tr>
                      <td><?php echo ++$start; ?></td>
                      <td><?php echo $row->tingkat; ?></td>
                      <td><?php echo $row->sebagai; ?></td>
                      <td><?php echo $row->bobot; ?></td>
                      <td><?php
                              $hapus = array(
                                        'class' => 'btn btn-sm btn-danger',
                                        'onclick' => 'javascript: return confirm(\'Kamu Yakin ?\')'
                                      );
                                      echo anchor(site_url('admin/bobotskkm/hapus_sebagai/'.$row->id_sebagai),'Hapus',$hapus);?></td>
                    </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- End Sebagai -->

    </div>
  </div>
</section><!-- /.content -->
