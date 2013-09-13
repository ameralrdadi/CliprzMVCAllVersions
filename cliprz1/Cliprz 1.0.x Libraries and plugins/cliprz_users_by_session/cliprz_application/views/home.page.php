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

<a href="<?=c_url("user/login")?>">Login</a> -
<a href="<?=c_url("user/account")?>">Account</a> -
<a href="<?=c_url("user/login")?>">Logout</a>
</div>

<div class="content">
<h2>Index</h2>
TEST    
<br />
<h2>Information</h2>
<pre>
Version : <?=cliprz::get_framework("version"); ?> <?=cliprz::get_framework("stability"); ?>
</pre>
</div>

<div class="under">
<?php echo cliprz::get_framework("under"); ?>
</div>

</body>
</html>