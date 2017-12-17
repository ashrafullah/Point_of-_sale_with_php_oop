<?php
ob_start('ob_gzhandler');
   session_start();
    include 'lib/Session.php';
    Session::checksession();

   ?>
  <?php
  //set headers to NOT cache a page
  header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
  header("Pragma: no-cache"); //HTTP 1.0
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  // Date in the past
  //or, if you DO want a file to cache, use:
  header("Cache-Control: max-age=2592000"); 
//30days (60sec * 60min * 24hours * 30days)
?>
<?php include 'config/dbcon.php';?>
<?php include 'lib/Database.php';?>
<?php include 'helpers/format.php';?>
<?php 
    $dbcon=new Database();
    $dfm=new Format();

?>
<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta name="description" content="POS-Point Of Sale">
<meta name="keywords" content="POS-Point Of Sale">
<meta name="author" content="IMRAN">
<title>POS-Point Of Sale</title>

<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">


<!-- fakeLoader CSS -->
<script src="public/js/jquery-2.1.4.min.js"></script>
<link href="public/css/fakeLoader.css" rel='stylesheet'>

<link href="public/css/spectrum.css" rel='stylesheet'>
<link rel="stylesheet" href="public/css/custom.css">
<?php include('includes/script.php'); ?>
<style type="text/css">
  .clockStyle {
    background-color: rgba(41, 45, 179, 0.66);
    border: #999 2px inset;
    padding: 5px;
    color: white;
    font-family: "Arial Black", Gadget, sans-serif;
    font-size: 14px;
    /* font-weight: bold; */
    letter-spacing: 3px;
    display: inline-block;
    /* border-radius: 8px; */
    position: absolute;
    top: 113px;
    right: 35px;
    z-index: 2;

}
</style>



<?php include 'favicon.php'; ?>
</head>
 <body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">
<div class="loader"></div>
<div class="outer-box"></div>

<script>
   $(window).load(function(){
     $('.loader').fadeOut();
});
 </script>
<div id="clockDisplay" class="clockStyle"></div>



