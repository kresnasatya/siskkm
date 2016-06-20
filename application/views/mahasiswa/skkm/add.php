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
            <?php echo form_label('Bukti Kegiatan', 'bukti_kegiatan'); ?>
            <?php echo form_error('bukti_kegiatan'); ?>
            <?php
              $extra = array(
                              'type' => 'file',
                              'id' => 'bukti_kegiatan',
                              'class' => 'form-control',
                              'required' => 'required'
              );
              echo form_upload('bukti_kegiatan', set_value('bukti_kegiatan'), $extra);
             ?>
          </div>
          <div class="form-group">
            <?php echo form_label('Jenis Kegiatan', 'id_jenis'); ?>
            <?php echo form_error('id_jenis'); ?>
            <?php
              $options = array(
                            'small'         => 'Small Shirt',
                            'med'           => 'Medium Shirt',
                            'large'         => 'Large Shirt',
                            'xlarge'        => 'Extra Large Shirt'
              );
              $attribute = array(
                            'class' => 'form-control select2',
                            'id' => 'id_jenis'
              );
              $shirts_on_sale = array('small', 'large');
              echo form_dropdown('id_jenis', $options, 'large', $attribute);
             ?>
          </div>
          <div class="form-group">
            <?php echo form_label('Tingkat Kegiatan', 'id_tingkat'); ?>
            <?php echo form_error('id_tingkat'); ?>
            <?php
              $options = array(
                            'small'         => 'Small Shirt',
                            'med'           => 'Medium Shirt',
                            'large'         => 'Large Shirt',
                            'xlarge'        => 'Extra Large Shirt'
              );
              $attribute = array(
                            'class' => 'form-control select2',
                            'id' => 'id_tingkat'
              );
              $shirts_on_sale = array('small', 'large');
              echo form_dropdown('id_tingkat', $options, 'large', $attribute);
             ?>
          </div>
          <div class="form-group">
            <?php echo form_label('Sebagai', 'id_sebagai'); ?>
            <?php echo form_error('id_sebagai'); ?>
            <?php
              $options = array(
                            'small'         => 'Small Shirt',
                            'med'           => 'Medium Shirt',
                            'large'         => 'Large Shirt',
                            'xlarge'        => 'Extra Large Shirt'
              );
              $attribute = array(
                            'class' => 'form-control select2',
                            'id' => 'id_sebagai'
              );
              $shirts_on_sale = array('small', 'large');
              echo form_dropdown('id_sebagai', $options, 'large', $attribute);
             ?>
          </div>
          <div class="form-group">
            <?php echo form_label('Bobot','bobot'); ?>
            <?php echo form_error('bobot'); ?>
            <?php
                $extra = array(
                                'type' => 'number',
                                'id' => 'bobot',
                                'class' => 'form-control',
                                'placeholder' => 'Bobot',
                                'required' => 'required'
                );
                echo form_input('bobot', set_value('bobot'), $extra);
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
