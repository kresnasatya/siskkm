<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Edit SKKM
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('mahasiswa/skkm');?>"><i class="fa fa-archive"></i>SKKKM</a></li>
    <li class="active">Data SKKM</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <?php echo form_open_multipart('mahasiswa/skkm/ubah'); ?>
        <div class="box-body">
          <div class="form-group">
            <?php echo form_label('Nama Kegiatan','nama_kegiatan'); ?>
            <?php echo form_error('nama_kegiatan'); ?>
            <?php
                $data = array(
                                'type' => 'text',
                                'name' => 'nama_kegiatan',
                                'value' => set_value('nama_kegiatan', $nama_kegiatan),
                                'id' => 'nama_kegiatan',
                                'class' => 'form-control',
                                'placeholder' => 'Nama Kegiatan',
                                'required' => 'required',
                                'autofocus' => 'autofocus');
                echo form_input($data);
            ?>
          </div>
          <div class="form-group">
            <?php echo form_label('File', 'filefoto'); ?>
            <?php echo form_error('filefoto'); ?>
            <?php
              $data = array(
                              'type' => 'file',
                              'name' => 'filefoto',
                              'id' => 'filefoto',
                              'class' => 'form-control',
                              'required' => 'required');
              echo form_upload($data);
             ?>
          </div>
          <div class="form-group">
            <?php echo form_label('Jenis Kegiatan', 'id_jenis'); ?>
            <?php echo form_error('id_jenis'); ?>
            <?php
              $extra = array(
                            'class' => 'form-control select2',
                            'id' => 'id_jenis');
              echo form_dropdown('id_jenis', $dd_jenis, $id_jenis, $extra);
             ?>
          </div>
          <div class="form-group">
            <?php echo form_label('Tingkat Kegiatan', 'id_tingkat'); ?>
            <?php echo form_error('id_tingkat'); ?>
            <?php
              $extra = array(
                            'class' => 'form-control select2',
                            'id' => 'id_tingkat');
              echo form_dropdown('id_tingkat', $dd_tingkat, $id_tingkat, $extra);
             ?>
          </div>
          <div class="form-group">
            <?php echo form_label('Sebagai', 'id_sebagai'); ?>
            <?php echo form_error('id_sebagai'); ?>
            <?php
              $extra = array(
                            'class' => 'form-control select2',
                            'id' => 'id_sebagai');
              echo form_dropdown('id_sebagai', $dd_jenis, $id_sebagai, $extra);
             ?>
          </div>
          <div class="form-group">
            <?php echo form_label('Nilai','nilai'); ?>
            <?php echo form_error('nilai'); ?>
            <?php
                $data = array(
                                'type' => 'number',
                                'name' => 'nilai',
                                'id' => 'nilai',
                                'value' => set_value('nilai', $nilai),
                                'class' => 'form-control',
                                'placeholder' => 'Bobot',
                                'required' => 'required'
                );
                echo form_input($data);
            ?>
          </div>
          <?php echo form_hidden('id', set_value('id', $id)); ?>
          <?php echo anchor(site_url('mahasiswa/skkm'),'Kembali','class="btn btn-default"'); ?>
          <?php echo form_submit('submit','Edit','class="btn btn-warning"'); ?>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</section><!-- /.content -->
