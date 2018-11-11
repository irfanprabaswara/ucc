<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="keyword" content="Codeigniter, bootstrap, Grocerycrud">
    <meta name="description" content="Custom Framework Codeigniter and bootstrap">
    <meta name="author" content="Asrul Hanafi">
    <title><?php echo $title ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/img/favicon-96x96.png') ?>">

    <!--Bootstrap-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
    <!--FontAwesome-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/font-awesome.min.css') ?>">
    <!--AdminLTE-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/AdminLTE.min.css') ?>">
    <!--CSS Plugins-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/js/plugins/iCheck/square/blue.css') ?>">
    <!--Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/a-design.css') ?>">
</head>
<body class="login-page">

    <!-- Page Content -->
    <?php echo $page ?>
    <!-- /#page-wrapper -->

<!--jQuery-->
<script src="<?php echo base_url('assets/js/plugins/jQuery/jQuery-2.1.4.min.js') ?>"></script> 
<!--JS Plugins-->
<script src="<?php echo base_url('assets/js/plugins/iCheck/icheck.min.js') ?>"></script>
<!--Bootstrap JS-->
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
<script>
    site         = '<?php echo site_url(); ?>';
    ur_class     = '<?php echo $this->uri->segment(1); ?>';
    url_function = '<?php echo $this->uri->segment(2); ?>';
</script>
<?php echo isset($scriptView) ? $scriptView : ''; ?>
<!--Custom JS-->
<script src="<?php echo base_url('assets/js/a-design.js') ?>"></script>
</body>
</html>