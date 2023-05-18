<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome to Admin Panel </title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url(); ?>admin_assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Waves Effect Css -->
    <link href="<?php echo base_url(); ?>admin_assets/plugins/node-waves/waves.css" rel="stylesheet" />
    <!-- Animation Css -->
    <link href="<?php echo base_url(); ?>admin_assets/plugins/animate-css/animate.css" rel="stylesheet" />
    <!-- Morris Chart Css-->
    <link href="<?php echo base_url(); ?>admin_assets/plugins/morrisjs/morris.css" rel="stylesheet" />
    <!-- Custom Css -->
    <link href="<?php echo base_url(); ?>admin_assets/css/style.css" rel="stylesheet">
    <!-- Bootstrap Select Css -->
    <link href="<?php echo base_url(); ?>admin_assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <link href="<?php echo base_url('admin_assets'); ?>/plugins/bootstrap-table/dist/bootstrap-table.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <!-- Sweetalert Css -->
    <link href="<?php echo base_url(); ?>admin_assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>admin_assets/css/themes/all-themes.css" rel="stylesheet" />
    
     
  <link rel="stylesheet" href="<?php echo base_url('assets/uploader/css/sweetalert.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/uploader/css/jquery.uploadfile.ajax.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/uploader/dropzone/css/dropzone.css'); ?>">

    
    
    <style>
#imagePreview tbody tr td:first-child {
    width: 85px;
    text-align: center;
}
#imagePreview tbody tr td {
    word-break: break-all;
}
.image-resize-drag {
    background-size: 50px 50px;
    background-repeat: no-repeat;
    text-align: center;
    background-position: center;
}
#imagePreview tbody tr:last-child {
    border: none;
}
#imagePreview tbody tr {
    padding: 10px !important;
    border-bottom: 1px solid #e3e4e6;
    margin-bottom: 5px !important;
    height: 68px;
}
.upload-filename {
    display: none;
}
</style>
</head>

<body class="theme-red">
    <!-- <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
   
   
    <div class="overlay"></div>   -->
    <!-- #END# Overlay For Sidebars -->
   
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header" style="width: 100%;">
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?php echo base_url(); ?>admin/dashboard">ADMIN Panel</a>
              <!--  <a class="hidden-xs hidden-sm"href="<?php echo base_url(); ?>admin/dashboard" style="float:right;">
                <img src="<?php echo base_url(); ?>admin_assets/images/logo.png" style="width: 145px;float: right;"></a>-->
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                   
                      <li> 
                        <a href="<?php echo base_url(); ?>admin/certificate-detail/">
                            <i class="material-icons">widgets</i>
                            <span>Certificate detail</span> 
                        </a>
                    </li>
                   

                    <li> 
                        <a href="<?php echo base_url(); ?>admin/trainee-certificate-detail/">
                            <i class="material-icons">widgets</i>
                            <span>Trainee Certificate detail</span> 
                        </a>
                    </li>
                   
                     <li> 
                        <a href="<?php echo base_url(); ?>admin/instructors-detail/">
                            <i class="material-icons">widgets</i>
                            <span>Instructors detail</span> 
                        </a>
                    </li>
                   

                    <li> 
                        <a href="<?php echo base_url(); ?>admin/id-card-generator-detail/">
                            <i class="material-icons">widgets</i>
                            <span>id card generator detail</span> 
                        </a>
                    </li>
                   
                    
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; <?php echo date("Y"); ?> 
                </div>
               
            </div>
            <!-- #Footer -->
        </aside>
    </section>