<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url('login');?>"><b>SI</b>SKKM</a>
  </div><!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Reset Password</p>
    <?php echo $this->session->flashdata('message'); ?>
    <?php echo form_open('resetpassword/index/' . $code); ?>
      <div class="form-group has-feedback">
        <label for="new_password"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length);?></label> <br />
        <?php echo form_input($new_password); ?>
        <span class="fa fa-unlock-alt form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm');?> <br />
        <?php echo form_input($new_password_confirm);?>
        <span class="fa fa-unlock-alt form-control-feedback"></span>
      </div>
      <?php echo form_input($user_id); ?>
      <?php echo form_hidden($csrf); ?>
      <div class="row">
        <div class="col-xs-12">
          <?php echo form_submit('submit', 'Log in', 'class="btn btn-primary btn-block btn-flat"') ?>
        </div><!-- /.col -->
      </div>
    <?php echo form_close();?>
  </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
