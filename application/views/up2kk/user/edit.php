<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Edit Profil</h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('up2kk/user');?>"><i class="fa fa-user"></i>Profil</a></li>
    <li class="active">Edit Profil</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <!-- form start-->
        <?php echo form_open(); ?>
          <div class="box-body">
            <div class="form-group">
              <?php echo form_label('Nama depan','nama_depan'); ?>
              <?php echo form_error('nama_depan'); ?>
              <?php
                  $nama_depan = array(
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    'name' => 'nama_depan',
                                    'id' => 'nama_depan',
                                    'placeholder' => 'Nama depan',
                                    'required' => 'required',
                                    'autofocus' => 'autofocus');
               echo form_input($nama_depan, set_value('nama_depan',$current_user->nama_depan)); ?>
            </div>
            <div class="form-group">
              <?php echo form_label('Nama belakang','nama_belakang'); ?>
              <?php echo form_error('nama_belakang'); ?>
              <?php
                  $nama_belakang = array(
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    'name' => 'nama_belakang',
                                    'id' => 'nama_belakang',
                                    'placeholder' => 'Nama belakang',
                                    'required' => 'required');
               echo form_input($nama_belakang, set_value('nama_belakang', $current_user->nama_belakang)); ?>
            </div>
            <div class="form-group">
              <?php echo form_label('Email','email'); ?>
              <?php echo form_error('email'); ?>
              <?php
                  $email = array(
                                    'type' => 'email',
                                    'class' => 'form-control',
                                    'name' => 'email',
                                    'id' => 'email',
                                    'placeholder' => 'Email',
                                    'required' => 'required');
               echo form_input($email, set_value('email',$current_user->email)); ?>
            </div>
            <div class="form-group">
              <?php echo form_label('Nip','nip'); ?>
              <?php echo form_error('nip'); ?>
              <?php
                  $nip = array(
                                'type' => 'text',
                                'class' => 'form-control',
                                'name' => 'nip',
                                'id' => 'nip',
                                'placeholder' => 'Nip');
               echo form_input($nip, set_value('nip',$current_user->nip)); ?>
            </div>
          </div><!-- /. box-body -->
          <?php echo form_hidden('user_id',$current_user->id); ?>
          <div class="box-footer">
            <?php echo form_submit('submit', 'Edit', 'class="btn btn-warning"'); ?>
            <a href="<?php echo site_url('up2kk/user') ?>" class="btn btn-default">Kembali</a>
          </div><!-- /. box-footer -->
        <?php echo form_close(); ?>
        <!-- /.form end -->
      </div>
    </div>
  </div>
</section><!-- /.content -->
