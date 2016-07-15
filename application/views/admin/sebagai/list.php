<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    Data Sebagai
    <small>kelola data sebagai di sini</small>
  </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin/sebagai'); ?>"><i class="fa fa-balance-scale"></i>Bobot SKKM</a></li>
        <li class="active">Data Sebagai</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3>Daftar Data Sebagai</h3>
                    <div class="col-md-4">
                        <a href="<?php echo site_url('admin/sebagai/tambah');?>" class="btn btn-primary">Tambah Sebagai</a>
                    </div>
                    <div class="col-md-4 text-center">
                        <div style="margin-top: 4px" id="message">
                            <?php echo $this->session->userdata('message'); ?>
                        </div>
                    </div>
                </div>
                <div class="box-body">
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
                              <td><?php echo ++$start ?></td>
                              <td><?php echo $row->tingkat; ?></td>
                              <td><a href="<?php echo site_url('admin/sebagai/ubah/'.$row->id_sebagai); ?>"><?php echo $row->sebagai; ?></a></td>
                              <td><?php echo $row->bobot; ?></td>
                              <td><?php
                                    $hapus = array(
                                              'class' => 'btn btn-sm btn-danger',
                                              'onclick' => 'javascript: return confirm(\'Kamu Yakin ?\')'
                                            );
                                            echo anchor(site_url('admin/sebagai/hapus/'.$row->id_sebagai),'Hapus',$hapus);?>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
