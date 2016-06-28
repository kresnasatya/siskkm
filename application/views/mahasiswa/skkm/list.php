<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Data SKKM
    <small>kelola data SKKM di sini</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('mahasiswa/skkm');?>"><i class="fa fa-archive"></i>SKKKM</a></li>
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
                foreach ($skkm as $row): ?>
                <tr>
                  <td><?php echo ++$start ?></td>
                  <td>
                    <?php if ($row->status == 0): ?>
                      <a href="<?php echo site_url('mahasiswa/skkm/ubah/'.$row->id); ?>"><?php echo $row->nama_kegiatan; ?></a>
                    <?php else: ?>
                      <?php echo $row->nama_kegiatan; ?>
                    <?php endif; ?>
                  </td>
                  <td>
                  <div class="anything" data-image="<?php echo base_url('fileskkm/'.$row->filefoto); ?>">
                    <img src="<?php echo base_url('fileskkm/resize/'.$row->filefoto); ?>" alt="" />
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
                    <?php if ($row->status == 0): ?>
                      <?php
                          $hapus = array(
                                    'class' => 'btn btn-sm btn-danger',
                                    'onclick' => 'javascript: return confirm(\'Kamu Yakin ?\')'
                                  );
                                  echo anchor(site_url('mahasiswa/skkm/hapus/'.$row->id),'Hapus',$hapus);
                      ?>
                    <?php else: ?>
                      -
                    <?php endif; ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <p><strong>
            SKKM yang valid:
            <?php
            $num = 0;
            $str = "poin";
            if ($skkm_valid == NULL): ?>
              <?php echo $num.' '.$str; ?>
            <?php else: ?>
              <?php echo $skkm_valid.' '.$str; ?>
            <?php endif; ?></strong></p>
          <p><strong>
            SKKM tidak valid:
            <?php
            $num = 0;
            $str = "poin";
            if ($skkm_tidak_valid == NULL): ?>
              <?php echo $num.' '.$str; ?>
            <?php else: ?>
              <?php echo $skkm_tidak_valid.' '.$str; ?>
            <?php endif; ?>
        </strong></p>
        <p>
          <strong>Status Kelulusan SKKM: </strong>
          <?php if ($skkm_valid >= $status_skkm): ?>
              <?php echo "LULUS"; ?>
            <?php else: ?>
              <?php echo "TIDAK LULUS"; ?>
          <?php endif; ?>
        </p>
        </div>
      </div>
    </div>
  </div>
</section><!-- /.content -->
