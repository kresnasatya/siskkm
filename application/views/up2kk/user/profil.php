<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Profil User</h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('up2kk/user');?>"><i class="fa fa-user"></i>Profil</a></li>
    <li class="active">Profil User</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body box-profile">
          <div class="col-md-3">
            <img class="profile-user-img img-responsive img-circle" src="<?php echo $gravatar_url; ?>" alt="gambar Profil User">
            <h3 class="profile-username text-center"><?php echo $current_user->nama_depan.' '.$current_user->nama_belakang; ?></h3>
          </div>
          <div class="col-md-9">
            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>Nama</b> <a class="pull-right"><?php echo $profil->nama_depan.' '.$profil->nama_belakang; ?></a>
              </li>
              <li class="list-group-item">
                <b>Email</b> <a class="pull-right"><?php echo $profil->email; ?></a>
              </li>
              <li class="list-group-item">
                <b>Nip</b> <a class="pull-right"><?php echo $profil->nip; ?></a>
              </li>
              <li class="list-group-item">
                <b>Jurusan</b> <a class="pull-right"><?php echo $profil->nama_jurusan; ?></a>
              </li>
            </ul>
            <?php echo anchor(site_url('up2kk/user/edit_profil'),'Edit Profil','class="btn btn-primary btn-block"'); ?>
            <?php echo anchor(site_url('up2kk/user/ubah_password'),'Ubah Password','class="btn btn-primary btn-block"'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>

</section><!-- /.content -->
