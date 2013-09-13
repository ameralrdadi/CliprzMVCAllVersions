<?php
if (cliprz::system(database)->num_rows($query_forums_parent)  == 0)
{
    echo "<table>		
        <thead>
				<tr class='sec_index'>
					<td colspan='5'>رسالة خطاء</td>
				</tr>
			</thead>
			<tbody>
                <tr class='sec_key'>
                        <td>لا يوجد منتدى رئيسي</td>
                </tr>
			</table>";
}
else
{
?>
		<table width="70%">				
<?php
    while ($row_forums_parent = cliprz::system(database)->fetch_assoc($query_forums_parent)) {  
?>
			<thead>
				<tr class="sec_index">
					<td colspan="5"><?php echo $row_forums_parent["title_forum"]; ?></td>
				</tr>
			</thead>
			<tbody>
                <tr class="sec_key">
                        <td width="80%">أسم القسم</td>
                        <td>عدد المواضيع</td>
                        <td>عدد المشاركات</td>
                </tr>
                
<?php

$query_forums_sub = cliprz::system(database)->select("forums","*","id_parent = '".$row_forums_parent["id"]."'") ;

if (cliprz::system(database)->num_rows($query_forums_sub) == 0)
{
    echo "<h2>لا يوجد منتدى فرعي</h2>";
}
else
{
    while ($row_forums_sub = cliprz::system(database)->fetch_assoc($query_forums_sub)) {  
?>
                <tr class="sec_key">
                        <td><a href="show_forum/<?php echo $row_forums_sub["id"] ?>">
                        <?php echo $row_forums_sub["title_forum"]; ?></a><br />
                       <?php echo $row_forums_sub["description"] ?></td>
                        <td>1</td>
                        <td>1</td>
                </tr>

<?php 
   
            } // End while sub
            
        } // End num sub
        
    } // End while parent
    
} // End num parent


    cliprz::system(database)->free_result($query_forums_parent);
    cliprz::system(database)->free_result($query_forums_sub);
    	
?>
			</tbody>
		</table>