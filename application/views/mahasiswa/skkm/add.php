<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Tambah SKKM
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('mahasiswa/beranda');?>"><i class="fa fa-home"></i> Beranda</a></li>
    <li><a href="<?php echo site_url('mahasiswa/skkm');?>">Menu SKKKM</a></li>
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
                $input = array(
                                'type' => 'text',
                                'name' => 'nama_kegiatan',
                                'id' => 'nama_kegiatan',
                                'class' => 'form-control',
                                'placeholder' => 'Nama Kegiatan',
                                'required' => 'required',
                                'autofocus' => 'autofocus');
                echo form_input($input);
            ?>
          </div>
          <div class="form-group">
            <?php echo form_label('Bukti Kegiatan', 'bukti_kegiatan'); ?>
            <?php echo form_error('bukti_kegiatan'); ?>
            <?php
              $upload = array(
                              'type' => 'file',
                              'name' => 'bukti_kegiatan',
                              'id' => 'bukti_kegiatan',
                              'class' => 'form-control',
                              'required' => 'required',
                              'autofocus' => 'autofocus');
              echo form_upload($upload);
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
                            'id' => 'id_jenis');
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
                            'id' => 'id_tingkat');
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
                            'id' => 'id_sebagai');
              $shirts_on_sale = array('small', 'large');
              echo form_dropdown('id_sebagai', $options, 'large', $attribute);
             ?>
          </div>
          <div class="form-group">
            <?php echo form_label('Bobot','bobot'); ?>
            <?php echo form_error('bobot'); ?>
            <?php
                $input = array(
                                'type' => 'number',
                                'name' => 'bobot',
                                'id' => 'bobot',
                                'class' => 'form-control',
                                'placeholder' => 'Bobot',
                                'required' => 'required',
                                'readonly' => 'readonly');
                echo form_input($input);
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
