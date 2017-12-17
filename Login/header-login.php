<?php 
    ob_start(); 
	include '../Admin/lib/Session.php';
	Session::init();
?>
<?php include '../Admin/config/dbcon.php';?>
<?php include '../Admin/lib/Database.php';?>
<?php include '../Admin/helpers/format.php';?>
<?php 
    $dbcon=new Database();
    $session=new Session();
    $dfm=new Format();

?>
<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta name="description" content="Point Of Sale">
<meta name="keywords" content="Point Of Sale">
<meta name="author" content="IMRAN">
<title>Login - Point Of Sale</title>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<!-- BEGIN VENDOR CSS-->
<link rel="stylesheet" type="text/css" href="../Admin/public/app-assets/css/bootstrap.css">
<!-- font icons-->
<link rel="stylesheet" type="text/css" href="../Admin/public/app-assets/fonts/icomoon.css">
<link rel="stylesheet" type="text/css" href="../Admin/public/app-assets/fonts/flag-icon-css/css/flag-icon.min.css">
<link rel="stylesheet" type="text/css" href="../Admin/public/app-assets/vendors/css/extensions/pace.css">
<!-- END VENDOR CSS-->
<!-- BEGIN ROBUST CSS-->
<link rel="stylesheet" type="text/css" href="../Admin/public/app-assets/css/bootstrap-extended.css">
<link rel="stylesheet" type="text/css" href="../Admin/public/app-assets/css/app.css">
<link rel="stylesheet" type="text/css" href="../Admin/public/app-assets/css/colors.css">
<!-- END ROBUST CSS-->
<!-- BEGIN Page Level CSS-->
<link rel="stylesheet" type="text/css" href="../Admin/public/app-assets/css/core/menu/menu-types/vertical-menu.css">
<link rel="stylesheet" type="text/css" href="../Admin/public/app-assets/css/core/menu/menu-types/vertical-overlay-menu.css">
<link rel="stylesheet" type="text/css" href="../Admin/public/app-assets/css/pages/login-register.css">
<!-- END Page Level CSS-->
<!-- BEGIN Custom CSS-->
<link rel="stylesheet" type="text/css" href="../Admin/public/assets/css/style.css">
<!-- END Custom CSS-->
<?php include 'favicon.php'; ?>
</head>