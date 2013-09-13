<?php
if(cliprz::system(database)->num_rows($query)){

$row = cliprz::system(database)->fetch_array($query);
?>
    <h2>Title : <?=$row["title_topic"]?></h2>
    <p><?=$row["title_topic"]?></p>
    <hr />
<?    
}else{

?>

    <h2>Not Found Topic</h2>

<? } ?>