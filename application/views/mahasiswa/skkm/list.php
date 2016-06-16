<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Data SKKM
    <small>kelola data SKKM di sini</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('mahasiswa/beranda'); ?>"><i class="fa fa-home"></i> Beranda</a></li>
    <li><a href="<?php echo site_url('mahasiswa/skkm'); ?>"> Menu SKKM</a></li>
    <li class="active">Data SKKM</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3>Daftar Data SKKM</h3>
          <div class="col-md-4">
            <a href="<?php echo site_url('mahasiswa/skkm/tambah');?>" class="btn btn-primary">Tambah SKKM</a>
          </div>
          <div class="col-md-4 text-center">
              <div style="margin-top: 4px"  id="message">
                  <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
              </div>
          </div>
        </div>
        <div class="box-body">
          <table id="skkmtable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kegiatan</th>
                    <th>Bukti</th>
                    <th>Bobot</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section><!-- /.content -->
