<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Edit Profil
  </h1>
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
              <?php echo form_label('Username','username'); ?>
              <?php echo form_error('username'); ?>
              <?php
                  $username = array(
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    'name' => 'username',
                                    'id' => 'username',
                                    'placeholder' => 'Username',
                                    'required' => 'required');
               echo form_input($username, set_value('username',$current_user->username)); ?>
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
               echo form_input($nip, set_value('nim',$current_user->nip)); ?>
            </div>
            <div class="form-group">
              <?php echo form_label('Ubah Password','password'); ?>
              <?php echo form_error('password'); ?>
              <?php
                  $pass = array(
                                'type' => 'password',
                                'class' => 'form-control',
                                'name' => 'password',
                                'id' => 'password',
                                'placeholder' => 'Password');
                  echo form_input($pass)
               ?>
            </div>
          </div><!-- /. box-body -->
          <?php echo form_hidden('user_id',$current_user->id); ?>
          <div class="box-footer">
            <?php echo anchor(site_url('admin/user/profil'), 'Kembali', 'class="btn btn-default"'); ?>
            <?php echo form_submit('submit', 'Edit', 'class="btn btn-warning"'); ?>
          </div><!-- /. box-footer -->
        <?php echo form_close(); ?>
        <!-- /.form end -->
      </div>
    </div>
  </div>
</section><!-- /.content -->
