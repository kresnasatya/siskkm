<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SISKKM - Login</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Normalize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/bootstrap/css/bootstrap.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/AdminLTE.min.css">

    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/b7364a05b7.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page">

<?php echo $contents; ?>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo base_url(); ?>backend/bootstrap/js/bootstrap.min.js"></script>
<script>
  // AJAX dropdown prodi
  function getProdi(value) {
    console.log(value);
    $.ajax({
      type: "POST",
      url: "<?php echo site_url('register/get_prodi'); ?>",
      data: "row=" + value,
      success: function (data) {
        $("#prodi").html(data);
        console.log(data);
      },

      error: function (XMLHttpRequest) {
        alert(XMLHttpRequest.responseText);
      }
    });
  };
</script>

</body>
</html>
