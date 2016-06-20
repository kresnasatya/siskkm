<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Ubah Password</h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <?php echo form_open('admin/user/ubah_password'); ?>
                <div class="box-body">
                    <div class="form-group">
                        <?php echo form_label('Password Lama','password_lama'); ?>
                        <?php echo form_error('password_lama'); ?>
                        <?php
                            $input = array(
                                            'type' => 'password',
                                            'name' => 'password_lama',
                                            'id' => 'password_lama',
                                            'class' => 'form-control',
                                            'placeholder' => 'Password Lama',
                                            'required' => 'required',
                                            'autofocus' => 'autofocus');
                            echo form_input($input);
                        ?>
                    </div>
                    <div class="form-group">
                        <?php echo form_label('Password Baru','password_baru'); ?>
                        <?php echo form_error('password_baru'); ?>
                        <?php
                            $input = array(
                                            'type' => 'password',
                                            'name' => 'password_baru',
                                            'id' => 'password_baru',
                                            'class' => 'form-control',
                                            'placeholder' => 'Password Baru',
                                            'required' => 'required',
                                            'autofocus' => 'autofocus');
                            echo form_input($input);
                        ?>
                    </div>
                    <div class="form-group">
                        <?php echo form_label('Konfirmasi Password','konfirmasi_password'); ?>
                        <?php echo form_error('konfirmasi_password'); ?>
                        <?php
                            $input = array(
                                            'type' => 'password',
                                            'name' => 'konfirmasi_password',
                                            'id' => 'konfirmasi_password',
                                            'class' => 'form-control',
                                            'placeholder' => 'Konfirmasi Password',
                                            'required' => 'required',
                                            'autofocus' => 'autofocus');
                            echo form_input($input);
                        ?>
                    </div>
                    <?php echo anchor(site_url('admin/user/profil'),'Kembali','class="btn btn-default"'); ?>
                    <?php echo form_submit('submit','Ubah Password','class="btn btn-warning"'); ?>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
