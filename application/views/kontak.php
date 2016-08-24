<!-- *****************************************************************************************************************
 CONTACT WRAP
 ***************************************************************************************************************** -->

<div id="contactwrap"></div>

<!-- *****************************************************************************************************************
 CONTACT FORMS
 ***************************************************************************************************************** -->

<div class="container mtb">
    <div class="row">
        <div class="col-lg-8">
            <h4>Kritik dan Saran</h4>
            <?php echo $this->session->userdata('email_sent'); ?>
            <div class="hline"></div>
            <p>Pengembang sangat terbuka dengan kritik dan saran yang membangun untuk sistem informasi ini.</p>
            <?php
            $attributes = array('role' => 'form');
            echo form_open('kontak/kirim_pesan', $attributes); ?>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" required="">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" required="">
            </div>
            <div class="form-group">
                <label for="perihal">Perihal</label>
                <input type="text" name="perihal" value="Kritik dan Saran" class="form-control" id="perihal"
                       readonly="">
            </div>
            <div class="form-group">
                <label for="pesan">Pesan</label>
                <textarea class="form-control" name="pesan" id="pesan" rows="3" required=""></textarea>
            </div>
            <?php echo form_submit('submit', 'Kirim', 'class="btn btn-theme"'); ?>
            <?php echo form_close(); ?>
        </div>
        <! --/col-lg-8 -->

        <div class="col-lg-4">
            <h4>Alamat</h4>
            <div class="hline"></div>
            <p>
                Politeknik Negeri Bali,<br/>
                30861, Jimbaran,<br/>
                Kuta Selatan, Badung, Bali.<br/>
            </p>
        </div>
    </div>
    <! --/row -->
</div><! --/container -->
