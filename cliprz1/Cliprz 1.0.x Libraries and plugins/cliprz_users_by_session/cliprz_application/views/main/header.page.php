<!DOCTYPE HTML>
<html>
<head>
<meta charset="<?php echo C_CHARSET; ?>" />
<title>Cliprz</title>
<link rel="icon" type="image/png" href="<?php echo c_image('favicon.png') ;?>" />
<link rel="stylesheet" href="<?php echo c_style("styles.css",false); ?>" type="text/css" />
<script type="text/javascript" src="<?php echo c_javascript("jquery.js"); ?>"></script>
</head>
<body>

<div class="logo">
    <img src="<?php echo c_image("logo.png"); ?>" alt="Cliprz" />

<a href="<?=c_url("home")?>">Home</a> -
<?php
if(!c_is_session("login")){
?>
<a href="<?=c_url("user/regsiter")?>">Regsiter</a> -
<a href="<?=c_url("user/login")?>">Login</a>
<?php    
}else{
?>
<a href="<?=c_url("user/account")?>">Account</a> -
<a href="<?=c_url("user/logout")?>">Logout</a>
<?php    
}
?>
</div>

<div class="content">

