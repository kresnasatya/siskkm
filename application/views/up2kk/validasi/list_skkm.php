<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Data SKKM
    <small>validasi data skkm di sini</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('up2kk/validasi');?>"><i class="fa fa-check-square-o"></i> Validasi SKKM</a></li>
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
        </div>
        <div class="box-body">
          <table id="mahasiswatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Kegiatan</th>
                  <th>File</th>
                  <th>Jenis</th>
                  <th>Tingkat</th>
                  <th>Sebagai</th>
                  <th>Nilai</th>
                  <th>Status</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
              <?php
              $start = 0;
              foreach ($list_skkm as $row): ?>
              <tr>
                <td><?php echo ++$start ?></td>
                <td>
                  <?php if ($row->status == 0): ?>
                    <?php echo $row->nama_kegiatan; ?>
                  <?php else: ?>
                    <?php echo $row->nama_kegiatan; ?>
                  <?php endif; ?>
                </td>
                <td>
                <div class="anything" data-image="<?php echo base_url('fileskkm/'.$row->filefoto); ?>">
                  <img src="<?php echo base_url('fileskkm/resize/'.$row->filefoto); ?>" />
                </div></td>
                <td><?php echo $row->jenis; ?></td>
                <td><?php echo $row->tingkat; ?></td>
                <td><?php echo $row->sebagai; ?></td>
                <td><?php echo $row->nilai; ?></td>
                <td>
                  <?php if ($row->status == 0): ?>
                      <?php echo "Tidak Valid"; ?>
                    <?php else: ?>
                      <?php echo "Valid"; ?>
                  <?php endif; ?>
                </td>
                <td>
                  <?php echo $row->keterangan; ?>
                </td>
                <td>
                  <?php
                      $extra = array('class' => 'btn btn-sm btn-success');
                      echo anchor(site_url('up2kk/validasi/skkm/'.$row->id),'Validasi',$extra);
                    ?>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section><!-- /.content -->
