<?=$error?>
<form action="<?=c_url("user/check_login")?>" method="POST">
<table border="1px">
<tr>
    <td>الاسم</td>
    <td><input type="text" name="username" /></td>
</tr>
<tr>
    <td>الرقم السري</td>
    <td><input type="password" name="password" /></td>
</tr>
<tr>
    <td colspan="2"><input type="submit" value="login" /></td>
</tr>
</table>
<input type="hidden" name="user" value="login" />
</form>