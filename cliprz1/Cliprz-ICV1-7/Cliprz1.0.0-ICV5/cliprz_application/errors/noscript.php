<?php if (!defined("IN_CLIPRZ")) die('Access Denied'); ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8" />
<title>No javascript !!</title>
<style type="text/css">
html,body { margin: 5px; padding: 0; outline: 0; }
body { background-color: white; color: black; }
#container { width: 500px; }
#bodytitle { font: 13pt/15pt verdana, arial, sans-serif; height: 35px; vertical-align: top; }
.bodytext  { font: 8pt/11pt verdana, arial, sans-serif;  }
a:link     { font: 8pt/11pt verdana, arial, sans-serif; color: red; }
a:visited  { font: 8pt/11pt verdana, arial, sans-serif; color: #4e4e4e; }
</style>
</head>
<body>

<div id="container">
<div id="bodytitle">No javascript !!</div>
<div class="bodytext ">
You must enabled javascript from your browser settings to access this page.
<br />
<br />
<a href="<?php echo c_url(""); ?>">Back to Homepage ?</a>
</div>
</div>

</body>
</html>