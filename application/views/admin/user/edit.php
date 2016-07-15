<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Edit Profil</h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('admin/user');?>"><i class="fa fa-user"></i>Profil</a></li>
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
                        <?php echo form_label('Nama depan', 'nama_depan'); ?>
                        <?php echo form_error('nama_depan'); ?>
                        <?php
                            $data = array(
                                              'type' => 'text',
                                              'class' => 'form-control',
                                              'name' => 'nama_depan',
                                              'value' => set_value('nama_depan', $current_user->nama_depan),
                                              'id' => 'nama_depan',
                                              'placeholder' => 'Nama Depan',
                                              'required' => 'required',
                                              'autofocus' => 'autofocus'
                            );
                         echo form_input($data);
                        ?>
                    </div>
                    <div class="form-group">
                        <?php echo form_label('Nama belakang', 'nama_belakang'); ?>
                        <?php echo form_error('nama_belakang'); ?>
                        <?php
                            $data = array(
                                              'type' => 'text',
                                              'class' => 'form-control',
                                              'name' => 'nama_belakang',
                                              'value' => set_value('nama_belakang', $current_user->nama_belakang),
                                              'id' => 'nama_belakang',
                                              'placeholder' => 'Nama Belakang',
                                              'required' => 'required'
                            );
                         echo form_input($data);
                        ?>
                    </div>
                    <div class="form-group">
                        <?php echo form_label('Email', 'email'); ?>
                        <?php echo form_error('email'); ?>
                        <?php
                            $data = array(
                                              'type' => 'email',
                                              'class' => 'form-control',
                                              'name' => 'email',
                                              'value' => set_value('email', $current_user->email),
                                              'id' => 'email',
                                              'placeholder' => 'Email',
                                              'required' => 'required'
                            );
                         echo form_input($data);
                        ?>
                    </div>
                    <div class="form-group">
                        <?php echo form_label('Nip', 'nip'); ?>
                        <?php echo form_error('nip'); ?>
                        <?php
                            $data = array(
                                          'type' => 'text',
                                          'class' => 'form-control',
                                          'name' => 'nip',
                                          'value' => set_value('nim', $current_user->nip),
                                          'id' => 'nip',
                                          'placeholder' => 'Nip'
                            );
                         echo form_input($data);
                        ?>
                    </div>
                </div>
                <!-- /. box-body -->
                <?php echo form_hidden('user_id', $current_user->id); ?>
                <div class="box-footer">
                    <?php echo anchor(site_url('admin/user'), 'Kembali', 'class="btn btn-default"'); ?>
                    <?php echo form_submit('submit', 'Edit', 'class="btn btn-warning"'); ?>
                </div>
                <!-- /. box-footer -->
                <?php echo form_close(); ?>
                <!-- /.form end -->
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
