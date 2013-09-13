<?=$error?>
<form action="<?=C_URL("topic/check_add")?>" method="POST">
<label>Title : </label>
<input type="text" name="title_topic" /><br />
<label>Content Topic : </label><br />
<textarea name="content_topic" rows="10" cols="30"></textarea><br />
<input type="submit" value="Add Topic" name="add_topic" />
</form>