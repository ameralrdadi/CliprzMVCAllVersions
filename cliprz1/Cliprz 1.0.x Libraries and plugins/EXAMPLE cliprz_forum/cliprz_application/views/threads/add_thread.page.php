<?php
// add by Cliprz Yousef Ismaeil
if (isset($errors) && !is_bool($errors))
{
?>
    <div class="errors"><?php echo $errors; ?></div>
<?php
}

?>

<form action="<?php echo c_url("add_thread/checking"); ?>" method="POST">
		<table width="80%">
			<thead>
				<tr class="sec_index">
					<td colspan="5">أضافة موضوع جديد</td>
				</tr>
			</thead>
			<tbody>
			
				<tr class="sec_key">
					<td>عنوان الموضوع</td>
					<td><input type="text" name="title_thread" value="<?php echo (isset($_POST['title_thread'])) ? c_stripslashes(c_htmlentities($_POST['title_thread'])) : ""; ?>" /></td>
				</tr>

				<tr class="sec_index">
					<td colspan="4">محتوى الموضوع</td>
				</tr>

				<tr class="sec_key">
					<td colspan="4">
						<textarea name="content_thread" rows="10" cols="50"><?php echo (isset($_POST['content_thread'])) ? c_stripslashes(c_htmlentities($_POST['content_thread'])) : ""; ?></textarea>
					</td>
				</tr>	

				<tr class="sec_key">
					<td colspan="4"><input type="submit" value="أضف" /></td>
				</tr>

				<!--</tr>-->
			</tbody>
		</table>
        <input type="hidden" name="action" value="add" />
</form>
	