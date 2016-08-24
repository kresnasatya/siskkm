<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">

    <title>SISKKM - Politeknik Negeri Bali</title>

    <!-- Normalize -->
    <link rel="stylesheet" href="<?php echo base_url('solid/assets/css/normalize.css'); ?>">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('solid/assets/css/bootstrap.css'); ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('solid/assets/css/style.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('solid/assets/css/font-awesome.min.css'); ?>" rel="stylesheet">


    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo site_url('beranda'); ?>">SISKKM</a>
        </div>
        <div class="navbar-collapse collapse navbar-right">
            <ul class="nav navbar-nav">
                <li class="<?php echo ($this->uri->segment(1) === 'beranda') ? 'active' : ''; ?>"><a
                        href="<?php echo site_url('beranda'); ?>">BERANDA</a></li>
                <li class="<?php echo ($this->uri->segment(1) === 'tentang') ? 'active' : ''; ?>"><a
                        href="<?php echo site_url('tentang'); ?>">TENTANG</a></li>
                <li class="<?php echo ($this->uri->segment(1) === 'pengumuman') ? 'active' : ''; ?>"><a
                        href="<?php echo site_url('pengumuman'); ?>">PENGUMUMAN</a></li>
                <li class="<?php echo ($this->uri->segment(1) === 'kontak') ? 'active' : ''; ?>"><a
                        href="<?php echo site_url('kontak'); ?>">KONTAK</a></li>
                <li><a href="<?php echo site_url('login'); ?>">LOGIN</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>

<!-- *****************************************************************************************************************
 HEADERWRAP
 ***************************************************************************************************************** -->

<?php echo $contents; ?>

<!-- *****************************************************************************************************************
 FOOTER
 ***************************************************************************************************************** -->
<div id="footerwrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h4>Tentang</h4>
                <div class="hline-w"></div>
                <p>Peringatan!!!<br>
                    Sistem ini masih dalam status uji coba dan pengembangan. Belum untuk produksi.</p>
            </div>
            <div class="col-lg-6">
                <h4>Alamat</h4>
                <div class="hline-w"></div>
                <p>
                    Politeknik Negeri Bali,<br/>
                    30861, Jimbaran,<br/>
                    Kuta Selatan, Badung, Bali.<br/>
                </p>
            </div>

        </div>
        <! --/row -->
    </div>
    <! --/container -->
</div>
<! --/footerwrap -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url('solid/assets/js/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('solid/assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('solid/assets/js/retina-1.1.0.js'); ?>"></script>
<script src="<?php echo base_url('solid/assets/js/jquery.hoverdir.js'); ?>"></script>
<script src="<?php echo base_url('solid/assets/js/jquery.hoverex.min.js'); ?>"></script>
<script src="<?php echo base_url('solid/assets/js/jquery.prettyPhoto.js'); ?>"></script>
<script src="<?php echo base_url('solid/assets/js/jquery.isotope.min.js'); ?>"></script>
<script src="<?php echo base_url('solid/assets/js/custom.js'); ?>"></script>

</body>
</html>
