<?=$error?>
<h1>حسابي</h1>
<form action="<?=c_url("user/update_account")?>" method="POST">
<table border="1px">
<tr>
    <td>الاسم</td>
    <td><input type="text" name="username" value="<?=$username?>" /></td>
</tr>
<tr>
    <td>البريد</td>
    <td><input type="text" name="email" value="<?=$email?>" /></td>
</tr>
<tr>
    <td>الرقم السري</td>
    <td><input type="password" name="password" /></td>
</tr>
<tr>
    <td colspan="2"><input type="submit"  value="حفظ" /></td>
</tr>
</table>
<input type="hidden" name="user" value="update_account" />
</form>