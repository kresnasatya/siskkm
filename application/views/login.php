<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url('login');?>"><b>SI</b>SKKM</a>
  </div><!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Silahkan log in</p>
    <?php echo $this->session->flashdata('message'); ?>
    <?php echo form_open(); ?>
      <div class="form-group has-feedback">
        <?php
          $user = array(
                      'type' => 'text',
                      'name' => 'identity',
                      'class' => 'form-control',
                      'placeholder' => 'Username',
                      'required' => 'required',
                      'autofocus' => 'autofocus');
        echo form_input($user); ?>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <?php
          $pass = array(
                      'type' => 'password',
                      'name' => 'password',
                      'class' => 'form-control',
                      'placeholder' => 'Password',
                      'required' => 'required');
          echo form_input($pass);?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <?php echo form_submit('submit', 'Log in', 'class="btn btn-primary btn-block btn-flat"') ?>
        </div><!-- /.col -->
      </div>
    <?php echo form_close();?>
    <a href="">Lupa password?</a><br>

  </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
