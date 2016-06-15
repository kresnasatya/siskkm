<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Edit Pengumuman
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
        <?php echo form_open('admin/pengumuman/ubah'); ?>
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
                echo form_input($input, $judul);
            ?>
          </div>
          <div class="form-group">
            <?php echo form_label('Isi','isi_pengumuman'); ?>
            <?php echo form_error('isi_pengumuman'); ?>
            <textarea name="isi_pengumuman" rows="8" cols="40" class="ckeditor" id="ckeditor"><?php echo $isi_pengumuman; ?></textarea>
          </div>
          <?php echo form_hidden('id',$id); ?>
          <?php echo anchor(site_url('admin/pengumuman'),'Kembali','class="btn btn-default"'); ?>
          <?php echo form_submit('submit','Edit','class="btn btn-warning"'); ?>
          <?php
                $hapus = array(
                          'class' => 'btn btn-danger',
                          'onclick' => 'javascript: return confirm(\'Are You Sure ?\')'
                        );
                        echo anchor(site_url('admin/pengumuman/delete/'.$id),'Hapus',$hapus);?>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</section><!-- /.content -->
