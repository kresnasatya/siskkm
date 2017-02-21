<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Ubah Pengumuman
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin/pengumuman'); ?>"><i class="fa fa-newspaper-o"></i>Pengumuman</a></li>
        <li class="active">Data Pengumuman</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <?php echo form_open('admin/pengumuman/update/' . $id); ?>
                <div class="box-body">
                    <div class="form-group">
                        <?php echo form_label('Judul Pengumuman', 'judul'); ?>
                        <?php echo form_error('judul'); ?>
                        <?php
                        $data = array(
                                'type' => 'text',
                                'name' => 'judul',
                                'value' => set_value('judul', $judul),
                                'id' => 'judul',
                                'class' => 'form-control',
                                'placeholder' => 'Judul Pengumuman',
                                'required' => 'required',
                                'autofocus' => 'autofocus');
                        echo form_input($data);
                        ?>
                    </div>
                    <div class="form-group">
                        <?php echo form_label('Isi', 'isi_pengumuman'); ?>
                        <?php echo form_error('isi_pengumuman'); ?>
                        <textarea class="textarea" name="isi_pengumuman" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $isi_pengumuman; ?></textarea>
                    </div>
                    <?php echo form_hidden('id', $id); ?>
                    <?php echo anchor(site_url('admin/pengumuman'), 'Kembali', 'class="btn btn-default"'); ?>
                    <?php echo form_submit('submit', 'Edit', 'class="btn btn-warning"'); ?>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</section><!-- /.content -->
