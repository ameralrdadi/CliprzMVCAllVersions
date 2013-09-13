<center><h3><a href="add_topic">Add New Topic</a></h3></center>
<?php
if(cliprz::system(database)->num_rows($query)){

    while($row = cliprz::system(database)->fetch_array($query)){
?>
    <h2>Title : <?=$row["title_topic"]?></h2>
    <p><?=$row["title_topic"]?></p>
    <p>
        <a href="<?=C_URL("show_topic/".$row["id"])?>">Show</a> -
        <a href="<?=C_URL("delete_topic/".$row["id"])?>">Delete</a> -
        <a href="<?=C_URL("edit_topic/".$row["id"])?>">Edit</a>
    </p>
    <hr />
<?
    }
    
}else{

?>

    <h2>Not Found Topic</h2>

<? } ?>