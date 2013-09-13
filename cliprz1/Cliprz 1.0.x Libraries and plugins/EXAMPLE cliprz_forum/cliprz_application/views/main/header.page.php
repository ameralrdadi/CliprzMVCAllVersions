<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8" />
<title><?php echo $title_site; ?></title>
<link rel="stylesheet" href="<?php c_style("styles.css",false); ?>" type="text/css" />
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
</head>
<body>

<!-- Start: contnet -->
<div id="content">

	<!-- Start: header -->
	<div id="header">
		<div id="headcont">
			   منتدى أطار عمل كليبرز  - Cliprz Forum  	  
			<!--<img src=<?php c_image("logo.png"); ?> />-->
		</div>
		<div id="headbar">
			<ul>
				<li><a href="http://localhost/cliprz_forum/home">رئيسية المنتديات</a></li>
				<?php if(isset($_SESSION["login"])){  ?>
					<li><a href="http://localhost/cliprz_forum/register">تسجيل عضوية</a></li>				
					<li><a href="http://localhost/cliprz_forum/login">دخول</a></li>				
				<?php }else{ ?>
					<li><a href="http://localhost/cliprz_forum/myaccount">حسابي</a></li>
					<li><a href="http://localhost/cliprz_forum/users">الاعضاء</a></li>
					<li><a href="http://localhost/cliprz_forum/logout">تسجيل خروج</a></li>
				<?php } ?>
				<li><a href="http://localhost/cliprz_forum/contact">اتصل بنا</a></li>
			</ul>
		</div>
		<div class="shadow">
		
		</div>

<?php if(empty($_SESSION["login"])){  ?>		
		<div id="panal">
		أهلاً وسهلاً بكم في منتدى أطار عمل كليبرز ، نتمنى لكم قضاء وقت ممتع مليئ بالفائدة معنا ، اذا كنت عضو غير مسجل <a href="http://localhost/cliprz_forum/register">أضغط هنا</a> للتسجيل معنا ونتشرف بذلك ، أو سجل دخولك من <a href="http://localhost/cliprz_forum/login">هنا</a>.
		</div>
<?php } ?>
		
		<!-- <a class="link" href="index.php">منتديات كليبرز</a> -->
	
	</div>
	<!-- End: header -->

	<!-- Start: cont -->
	<div id="cont">
	
	