<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Add MVC Cliprz</title>
</head>
<body>
<form action="<?= C_URL.'addmvc/check' ;?>" method="POST">
<input type="text" name="page_name" /> ||<font style="color:blue"> insert page name ::</font><font style="color:green"> Name = turki => Okay</font> ;<font style="color:red"> Name = turki.page.php => ERROR.</font><br />
<input type="text" name="controllers_class" /> ||<font style="color:blue"> insert class for controllers.</font><br />
<select name="router_method"> 
<option value="POST">POST</option>
<option value="GET">GET</option>
</select> ||<font style="color:blue"> Select Method POST OR GET.</font><br />
<input type="submit" value="Add" name="add_mvc" />
</form>
</body>
</html>