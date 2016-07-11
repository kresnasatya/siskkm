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
        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
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
            <label for="filefoto">Bukti Kegiatan</label> <span class="label label-success">Ukuran maksimal 5MB. Format file: jpeg, jpg, dan png.</span>
            <?php echo form_error('filefoto'); ?>
            <input type="file" name="filefoto" value="<?php echo base_url('fileskkm/resize/'.$filefoto); ?>" id="filefoto" class="form-control" required>
          </div>
          <div class="form-group">
            <?php echo form_label('Jenis Kegiatan', 'id_jenis'); ?>
            <?php echo form_error('id_jenis'); ?>
            <select class="form-control" name="id_jenis" id="jenis" onchange="getTingkat(this.value)" required>
              <option value="">Silahkan Pilih</option>
              <?php foreach ($dd_jenis as $row): ?>
                <option value="<?php echo $row['id_jenis'] ?>"
                  <?php if ($row['id_jenis'] == $id_jenis): ?>
                    selected="selected"
                  <?php endif; ?>>
                  <?php echo $row['jenis'] ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <?php echo form_label('Tingkat Kegiatan', 'id_tingkat'); ?>
            <?php echo form_error('id_tingkat'); ?>
            <select name="id_tingkat" id="tingkat" class="form-control" onchange="getSebagai(this.value)" required>
              <option value="">Silahkan Pilih</option>
              <?php foreach ($dd_tingkat as $row): ?>
                <option value="<?php echo $row['id_tingkat'] ?>"
                  <?php if ($row['id_tingkat'] == $id_tingkat): ?>
                    selected="selected"
                  <?php endif; ?>
                >
                  <?php echo $row['tingkat']; ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <?php echo form_label('Sebagai', 'id_sebagai'); ?>
            <?php echo form_error('id_sebagai'); ?>
            <select name="id_sebagai" id="sebagai" class="form-control" onchange="getNilai(this.value)" required>
              <option value="">Silahkan Pilih</option>
              <?php foreach ($dd_sebagai as $row): ?>
                <option value="<?php echo $row['id_sebagai'] ?>"
                  <?php if ($row['id_sebagai'] == $id_sebagai): ?>
                    selected="selected"
                  <?php endif; ?>
                >
                  <?php echo $row['sebagai']; ?>
                </option>
              <?php endforeach; ?>
            </select>
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
                                'required' => 'required',
                                'readonly' => 'readonly'
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
