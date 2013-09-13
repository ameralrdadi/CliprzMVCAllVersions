<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8" />
<title>Cliprz</title>
<link rel="stylesheet" href="<?php c_style("styles.css",false); ?>" type="text/css" />
</head>
<body>

<div class="logo">
    <img src="<?php c_image("logo.png"); ?>" alt="Cliprz" />
</div>

<div class="content">
مرحباً بك في إطار العمل <strong>Cliprz</strong>, أول إطار عمل عربي مجاني ومفتوح المصدر مكتوب باللغة PHP,
هذا الاطار سهل وسريع وآمن للاستخدام يمكنك معرفة المزيد عن الإطار عبر زيارة <a target="_blank" href="http://cliprz.org/manual">المستندات</a> قم بزيارة الموقع الرسمي بشكل دوري لمعرفة آخر الاصدارات والتحديثات .
<br />
<br />
يمكنك تعديل هذه الصفحة عبر زيارة
<div class="path">
    cliprz_application/views/home.page.php
</div>
<br />
<br />
كما يمكنك تعديل المتحكم من مجلد controllers عبر زيارة الرابط ادناه
<div class="path">
    cliprz_application/controllers/home.php
</div>
<br />
<br />
كما يمكنك تعديل ملفات CSS عبر زيارة
<div class="path">
    public/css/styles.css
</div>
يعتبر ملف public هو مجلد خاص بملفات الصور و CSS و الجافا سكربت (javascript) .
<br />
<br />
<br />
كما ننبه على تعديل قيمة url من ملف
<div class="path">
    cliprz_application/config/config.php
</div>
أبحث عن
<div class="code">
<?php
highlight_string('<?php

$_config[\'output\'][\'url\'] = "http://127.0.0.1/Cliprz/";

?>');
?>
</div>
وغيره لرابطك الخاص حتى يتم جلب الملفات بشكل الصحيح .
<br />
<br />
<h2>معلومات اللإصدار</h2>
<pre>
رقم الاصدار : <?=cliprz::get_framework("version"); ?> <?=cliprz::get_framework("stability"); ?>
</pre>
</div>

<div class="under">
<?php echo cliprz::get_framework("under"); ?>
</div>

</body>
</html>