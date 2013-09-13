<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8" />
<title><?php echo (isset($title)) ? $title : ""; ?></title>
</head>
<body>


<div><?php echo $msg; ?></div>
<a href="<?php echo c_url($page); ?>">اذا كان متصفحك لا يدعم الانتقال التلقائي اضغط هنا</a>
<meta http-equiv="refresh" content="5; url=<?php echo c_url($page); ?>" />

</body>
</html>
<!--
غير css وشكل الملف لشكل الذي تريده قمت بعمله بشكل سريع لتوضيح كفكره
-->