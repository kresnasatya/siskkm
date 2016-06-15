<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Tambah Pengumuman
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('admin/beranda');?>"><i class="fa fa-home"></i> Beranda</a></li>
    <li><a href="<?php echo site_url('admin/pengumuman');?>">Menu Pengumuman</a></li>
    <li class="active">Data Pengumuman</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <?php echo form_open('admin/pengumuman/tambah'); ?>
        <div class="box-body">
          <div class="form-group">
            <?php echo form_label('Judul Pengumuman','judul'); ?>
            <?php echo form_error('judul'); ?>
            <?php
                $input = array(
                                'type' => 'text',
                                'name' => 'judul',
                                'id' => 'judul',
                                'class' => 'form-control',
                                'placeholder' => 'Judul Pengumuman',
                                'required' => 'required',
                                'autofocus' => 'autofocus');
                echo form_input($input);
            ?>
          </div>
          <div class="form-group">
            <?php echo form_label('Isi','isi_pengumuman'); ?>
            <?php echo form_error('isi_pengumuman'); ?>
            <textarea name="isi_pengumuman" class="ckeditor" id="ckeditor"></textarea>
          </div>
          <?php echo form_submit('submit','Submit','class="btn btn-primary"'); ?>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</section><!-- /.content -->
