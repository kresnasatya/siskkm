<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Data Mahasiswa
    <small>validasi data skkm di sini</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('up2kk/validasi');?>"><i class="fa fa-check-square-o"></i> Validasi SKKM</a></li>
    <li class="active">Data Mahasiswa</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3>Daftar Data Mahasiswa</h3>
        </div>
        <div class="box-body">
          <table id="mahasiswatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Mahasiswa</th>
                    <th>NIM</th>
                    <th>Prodi</th>
                    <th>Kelas</th>
                </tr>
            </thead>
            <tbody>
              <?php
              $start = 0;
              foreach ($mahasiswa as $row): ?>
              <tr>
                <td><?php echo ++$start ?></td>
                <td><a href="<?php echo site_url('up2kk/validasi/skkm/'.$row->id); ?>"><?php echo $row->nama_depan.' '.$row->nama_belakang; ?></a></td>
                <td><?php echo $row->nim; ?></td>
                <td><?php echo $row->jenjang.' '.$row->nama_prodi; ?></td>
                <td><?php echo $row->semester.$row->kelas; ?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section><!-- /.content -->
