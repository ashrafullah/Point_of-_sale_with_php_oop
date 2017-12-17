<?php include 'Admin/config/dbcon.php';?>
<?php include 'Admin/lib/Database.php';?>
<?php include 'Admin/helpers/format.php';?>
<?php 
  $dbcon=new Database();
  // $session=new Session();
  $dfm=new Format();

?>
<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>POS - Point Of Sale</title>
    <!-- google fonts -->
    <link href='https://fonts.googleapis.com/css?family=Gentium+Basic:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Yeseva+One' rel='stylesheet' type='text/css'>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Frontend-assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="Frontend-assets/css/bootstrap.min.css">
    <link href="Frontend-assets/style.css" rel="stylesheet">
    <link href="Frontend-assets/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php include 'favicon.php'; ?>
 </head>