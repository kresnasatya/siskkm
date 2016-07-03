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
            <label for="filefoto">Upload File </label> <span class="label label-success">Ukuran maksimal 5MB. Format file: jpeg, jpg, dan png.</span>
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
            <select class="form-control" name="id_jenis" id="jenis" onchange="getTingkat(this.value)" required="">
              <option value="">Silahkan Pilih</option>
              <?php foreach ($dd_jenis as $row): ?>
                <option value="<?php echo $row['id_jenis'] ?>"><?php echo $row['jenis']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <?php echo form_label('Tingkat Kegiatan', 'id_tingkat'); ?>
            <?php echo form_error('id_tingkat'); ?>
            <select name="id_tingkat" id="tingkat" class="form-control" onchange="getSebagai(this.value)" required="">
              <option value="">Silahkan Pilih</option>
            </select>
          </div>
          <div class="form-group">
            <?php echo form_label('Sebagai', 'id_sebagai'); ?>
            <?php echo form_error('id_sebagai'); ?>
            <select name="id_sebagai" id="sebagai" class="form-control" onchange="getNilai(this.value)" required="">
              <option value="">Silahkan Pilih</option>
            </select>
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
                                'required' => 'required',
                                'readonly' => 'readonly'
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
