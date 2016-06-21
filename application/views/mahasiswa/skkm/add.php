<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Tambah SKKM
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
        <?php echo form_open_multipart('mahasiswa/skkm/tambah'); ?>
        <div class="box-body">
          <div class="form-group">
            <?php echo form_label('Nama Kegiatan','nama_kegiatan'); ?>
            <?php echo form_error('nama_kegiatan'); ?>
            <?php
                $extra = array(
                                'type' => 'text',
                                'id' => 'nama_kegiatan',
                                'class' => 'form-control',
                                'placeholder' => 'Nama Kegiatan',
                                'required' => 'required',
                                'autofocus' => 'autofocus'
                );
                echo form_input('nama_kegiatan', set_value('nama_kegiatan'), $extra);
            ?>
          </div>
          <div class="form-group">
            <?php echo form_label('File','filefoto'); ?>
            <?php echo form_error('filefoto'); ?>
            <?php
                $extra = array(
                              'id' => 'filefoto',
                              'class' => 'form-control',
                              'required' => 'required');
                echo form_upload('filefoto', set_value('filefoto'), $extra); ?>
          </div>
          <div class="form-group">
            <?php echo form_label('Jenis Kegiatan', 'id_jenis'); ?>
            <?php echo form_error('id_jenis'); ?>
            <?php
              $extra = array(
                            'class' => 'form-control select2',
                            'id' => 'id_jenis',
                            'required' => 'required'
              );
              echo form_dropdown('id_jenis', $dd_jenis, set_value('id_jenis'), $extra);
             ?>
          </div>
          <div class="form-group">
            <?php echo form_label('Tingkat Kegiatan', 'id_tingkat'); ?>
            <?php echo form_error('id_tingkat'); ?>
            <?php
              $extra = array(
                            'class' => 'form-control select2',
                            'id' => 'id_tingkat',
                            'required' => 'required'
              );
              echo form_dropdown('id_tingkat', $dd_tingkat, set_value('id_tingkat'), $extra);
             ?>
          </div>
          <div class="form-group">
            <?php echo form_label('Sebagai', 'id_sebagai'); ?>
            <?php echo form_error('id_sebagai'); ?>
            <?php
              $extra = array(
                            'class' => 'form-control select2',
                            'id' => 'id_sebagai',
                            'required' => 'required'
              );
              echo form_dropdown('id_sebagai', $dd_sebagai, set_value('id_sebagai'), $extra);
             ?>
          </div>
          <div class="form-group">
            <?php echo form_label('Nilai','nilai'); ?>
            <?php echo form_error('nilai'); ?>
            <?php
                $extra = array(
                                'type' => 'number',
                                'name' => 'nilai',
                                'value' => set_value('nilai'),
                                'id' => 'nilai',
                                'class' => 'form-control',
                                'placeholder' => 'Nilai',
                                'required' => 'required'
                );
                echo form_input($extra);
            ?>
          </div>
          <?php echo anchor(site_url('mahasiswa/skkm'),'Kembali','class="btn btn-default"'); ?>
          <?php echo form_submit('submit','Tambah','class="btn btn-primary"'); ?>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</section><!-- /.content -->
