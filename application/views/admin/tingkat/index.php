<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Tingkat
        <small>kelola di sini</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin/tingkat'); ?>"><i class="fa fa-balance-scale"></i>Bobot SKKM</a></li>
        <li class="active">Tingkat</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3>Daftar Tingkat</h3>
                    <div class="col-md-4">
                        <a href="<?php echo site_url('admin/tingkat/create'); ?>" class="btn btn-primary">Tambah</a>
                    </div>
                    <div class="col-md-4 text-center">
                        <div style="margin-top: 4px" id="message">
                            <strong><?php echo $this->session->userdata('message'); ?></strong>
                        </div>
                    </div>
                </div>
                <div class="box-body">
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
                                <td>
                                  <?php
                                    $ubah = array('class' => 'btn btn-sm btn-warning');
                                    echo anchor(site_url('admin/tingkat/edit/' . $row->id_tingkat), 'Ubah', $ubah); ?>
                                  <?php
                                    $hapus = array(
                                        'class' => 'btn btn-sm btn-danger',
                                        'onclick' => 'javascript: return confirm(\'Anda yakin menghapus ' . $row->tingkat . '?\')');
                                    echo anchor(site_url('admin/tingkat/delete/' . $row->id_tingkat), 'Hapus', $hapus); ?>
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
