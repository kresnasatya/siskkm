<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Tambah Sebagai
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('admin/sebagai');?>"><i class="fa fa-balance-scale"></i>Bobot SKKM</a></li>
    <li class="active">Data Sebagai</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <?php echo form_open('admin/sebagai/tambah'); ?>
        <div class="box-body">
          <div class="form-group">
            <?php echo form_label('Tingkat', 'tingkat'); ?>
            <?php echo form_error('tingkat'); ?>
            <?php
              $extra = array(
                             'class' => 'form-control',
                             'required' => 'required',
                             'autofocus' => 'autofocus'
              );
              echo form_dropdown('id_tingkat_fk', $dd_tingkat, $tingkat_selected, $extra);
            ?>
          </div>
          <div class="form-group">
            <?php echo form_label('Sebagai', 'sebagai'); ?>
            <?php echo form_error('sebagai'); ?>
            <?php
                $data = array(
                                'type' => 'text',
                                'id' => 'sebagai',
                                'name' => 'sebagai',
                                'value' => set_value('sebagai'),
                                'class' => 'form-control',
                                'placeholder' => 'Sebagai',
                                'required' => 'required',
                );
                echo form_input($data);
            ?>
          </div>
          <div class="form-group">
            <?php echo form_label('Bobot', 'bobot'); ?>
            <?php echo form_error('bobot'); ?>
            <?php
                $data = array(
                                'type' => 'number',
                                'name' => 'bobot',
                                'id' => 'Bobot',
                                'class' => 'form-control',
                                'placeholder' => 'Bobot',
                                'required' => 'required'
                );
                echo form_input($data);
            ?>
          </div>
          <?php echo anchor(site_url('admin/sebagai'), 'Kembali', 'class="btn btn-default"'); ?>
          <?php echo form_submit('submit', 'Tambah', 'class="btn btn-primary"'); ?>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</section><!-- /.content -->
