<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Tambah User
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin/users'); ?>"><i class="fa fa-users"></i>Users</a></li>
        <li class="active">Data User</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <!-- form start-->
                <?php
                $attribute = array('id' => 'usersForm');
                echo form_open('admin/users/tambah', $attribute); ?>
                <div class="box-body">
                    <div class="form-group">
                        <?php echo form_label('Nama depan', 'nama_depan'); ?>
                        <?php echo form_error('nama_depan'); ?>
                        <?php
                        $data = array(
                            'type' => 'text',
                            'class' => 'form-control',
                            'name' => 'nama_depan',
                            'value' => set_value('nama_depan'),
                            'id' => 'nama_depan',
                            'placeholder' => 'Nama depan',
                            'required' => 'required',
                            'autofocus' => 'autofocus'
                        );
                        echo form_input($data); ?>
                    </div>
                    <div class="form-group">
                        <?php echo form_label('Nama belakang', 'nama_belakang'); ?>
                        <?php echo form_error('nama_belakang'); ?>
                        <?php
                        $data = array(
                            'type' => 'text',
                            'class' => 'form-control',
                            'name' => 'nama_belakang',
                            'value' => set_value('nama_belakang'),
                            'id' => 'nama_belakang',
                            'placeholder' => 'Nama belakang',
                            'required' => 'required'
                        );
                        echo form_input($data); ?>
                    </div>
                    <div class="form-group">
                        <?php echo form_label('Email', 'email'); ?>
                        <?php echo form_error('email'); ?>
                        <?php
                        $data = array(
                            'type' => 'email',
                            'class' => 'form-control',
                            'name' => 'email',
                            'value' => set_value('email'),
                            'id' => 'email',
                            'placeholder' => 'Email',
                            'required' => 'required'
                        );
                        echo form_input($data); ?>
                    </div>
                    <div class="form-group">
                        <?php if (isset($groups)): ?>
                            <?php echo form_label('Hak Akses', 'groups[]'); ?>
                            <?php foreach ($groups as $group): ?>
                                <div class="radio">
                                    <label>
                                        <?php
                                        $extra = array(
                                            'onclick' => 'form_add_check()',
                                            'required' => TRUE
                                        );
                                        echo form_radio('groups[]', $group->id, set_radio('groups[]', $group->id), $extra); ?>
                                        <?php echo $group->name; ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <?php echo form_label('Nim', 'nim'); ?>
                        <?php echo form_error('nim'); ?>
                        <?php
                        $data = array(
                            'type' => 'text',
                            'class' => 'form-control',
                            'name' => 'nim',
                            'value' => set_value('nim'),
                            'id' => 'nim',
                            'placeholder' => 'Nim',
                            'maxlength' => 10
                        );
                        echo form_input($data); ?>
                    </div>
                    <div class="form-group">
                        <?php echo form_label('Nip', 'nip'); ?>
                        <?php echo form_error('nip'); ?>
                        <?php
                        $data = array(
                            'type' => 'text',
                            'class' => 'form-control',
                            'name' => 'nip',
                            'value' => set_value('nip'),
                            'id' => 'nip',
                            'placeholder' => 'Nip',
                            'maxlength' => 18
                        );
                        echo form_input($data); ?>
                    </div>
                    <div class="form-group">
                        <?php echo form_label('Jurusan', 'id_jurusan'); ?>
                        <?php echo form_error('id_jurusan'); ?>
                        <select class="form-control" name="id_jurusan" id="jurusan" onchange="getProdi(this.value)">
                            <option value="">Silahkan Pilih</option>
                            <?php foreach ($dd_jurusan as $row): ?>
                                <option value="<?php echo $row->id; ?>"><?php echo $row->nama_jurusan; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <?php echo form_label('Prodi', 'id_prodi'); ?>
                        <?php echo form_error('id_prodi'); ?>
                        <select name="id_prodi" id="prodi" class="form-control">
                            <option value="">Silahkan Pilih</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <?php echo form_label('Semester', 'id_semester'); ?>
                        <?php echo form_error('id_semester'); ?>
                        <?php
                        $extra = array(
                            'class' => 'form-control',
                            'id' => 'semester'
                        );
                        echo form_dropdown('id_semester', $dd_semester, $semester_selected, $extra);
                        ?>
                    </div>
                    <div class="form-group">
                        <?php echo form_label('Kelas', 'id_kelas'); ?>
                        <?php echo form_error('id_kelas'); ?>
                        <?php
                        $extra = array(
                            'class' => 'form-control',
                            'id' => 'kelas'
                        );
                        echo form_dropdown('id_kelas', $dd_kelas, $kelas_selected, $extra);
                        ?>
                    </div>
                </div><!-- /. box-body -->
                <div class="box-footer">
                    <?php echo anchor(site_url('admin/users'), 'Kembali', 'class="btn btn-default"'); ?>
                    <?php echo form_submit('submit', 'Tambah', 'class="btn btn-primary"'); ?>
                </div><!-- /. box-footer -->
                <?php echo form_close(); ?>
                <!-- /.form end -->
            </div>
        </div>
    </div>
</section><!-- /.content -->
