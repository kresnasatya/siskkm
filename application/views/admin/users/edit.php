<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Edit User
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('admin/beranda');?>"><i class="fa fa-home"></i> Beranda</a></li>
    <li><a href="<?php echo site_url('admin/users');?>">Menu Users</a></li>
    <li class="active">Data Users</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <!-- form start-->
        <?php echo form_open('admin/users/ubah'); ?>
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
               echo form_input($nama_depan, set_value('nama_depan',$user->nama_depan)); ?>
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
               echo form_input($nama_belakang, set_value('nama_belakang', $user->nama_belakang)); ?>
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
               echo form_input($username, set_value('username',$user->username)); ?>
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
               echo form_input($email, set_value('email',$user->email)); ?>
            </div>
            <div class="form-group">
              <?php if (isset($groups)): ?>
                <?php echo form_label('Groups', 'groups[]'); ?>
                <?php foreach ($groups as $group): ?>
                  <div class="checkbox">
                    <label>
                      <?php echo form_radio('groups[]', $group->id, set_radio('groups[]', $group->id, in_array($group->id,$usergroups))); ?>
                      <?php echo $group->name; ?>
                    </label>
                  </div>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
            <div class="form-group">
              <?php echo form_label('Nim','nim'); ?>
              <?php echo form_error('nim'); ?>
              <?php
                  $nim = array(
                                'type' => 'text',
                                'class' => 'form-control',
                                'name' => 'nim',
                                'id' => 'nim',
                                'placeholder' => 'Nim');
               echo form_input($nim, set_value('nim',$user->nim)); ?>
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
               echo form_input($nip, set_value('nim',$user->nip)); ?>
            </div>
            <div class="form-group">
              <?php echo form_label('Jurusan', 'id_jurusan'); ?>
              <?php echo form_error('id_jurusan'); ?>
              <?php
                  $jurusan_attribute = 'class="form-control select2"';
                  echo form_dropdown('id_jurusan', $dd_jurusan, set_value('id_jurusan',$user->id_jurusan), $jurusan_attribute);
               ?>
            </div>
            <div class="form-group">
              <?php echo form_label('Prodi', 'id_prodi'); ?>
              <?php echo form_error('id_prodi'); ?>
              <?php
                $prodi_attribute = 'class="form-control select2"';
                echo form_dropdown('id_prodi', $dd_prodi, set_value('id_prodi',$user->id_prodi), $prodi_attribute);
               ?>
            </div>
            <div class="form-group">
              <label for="kelas">Kelas <?php echo form_error('id_kelas'); ?></label>
              <?php
                $kelas_attribute = 'class="form-control select2"';
                echo form_dropdown('id_kelas', $dd_kelas, set_value('id_kelas',$user->id_kelas), $kelas_attribute);
               ?>
            </div>
            <div class="form-group">
              <label for="semester">Semester <?php echo form_error('id_semester'); ?></label>
              <?php
                $semester_attribute = 'class="form-control select2"';
                echo form_dropdown('id_semester', $dd_semester, set_value('id_semester',$user->id_semester), $semester_attribute);
               ?>
            </div>
          </div><!-- /. box-body -->
          <?php echo form_hidden('user_id',$user->id); ?>
          <div class="box-footer">
            <?php echo anchor(site_url('admin/users'),'Kembali','class="btn btn-default"'); ?>
            <?php echo form_submit('submit', 'Edit', 'class="btn btn-warning"'); ?>
          </div><!-- /. box-footer -->
        <?php echo form_close(); ?>
        <!-- /.form end -->
      </div>
    </div>
  </div>
</section><!-- /.content -->
