<?=$error?>
<form action="<?=C_URL("topic/check_edit/".$id_topic)?>" method="POST">
<label>Title : </label>
<input type="text" name="title_topic" value="<?=$title_topic?>" /><br />
<label>Content Topic : </label><br />
<textarea name="content_topic" rows="10" cols="30"><?=$content_topic?></textarea><br />
<input type="hidden" name="id_topic" value="<?=$id_topic?>" />
<input type="submit" value="Update Topic" name="update_topic" />
</form>