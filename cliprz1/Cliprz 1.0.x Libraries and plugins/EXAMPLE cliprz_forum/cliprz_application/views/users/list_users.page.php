		<table width="60%"> 

<?php
if(cliprz::system(database)->num_rows($query_users) == 0)
{
echo '	<thead>
				<tr class="sec_index">
					<td colspan="5">رسالة خطاء</td>
				</tr>
			</thead>	
			<tbody>
				<tr class="sec_key">
					<td>لا يوجد أعضاء</td>
				</tr>';
}
else
{
?>
			<thead>
				<tr class="sec_index">
					<td colspan="5">الاعضاء</td>
				</tr>
			</thead>
			<tbody>
    			<tr class="sec_key">
					<td>#</td>
					<td>أسم العضو</td>
					<td>عدد المواضيع</td>
					<td>عدد المشاركات</td>
				</tr>

<?php

$counter = 0;
    
    while($row_users = cliprz::system(database)->fetch_assoc($query_users))
    {

        $counter++;

        echo '<tr>
    					<td>'.$counter.'</td>
    					<td>'.$row_users["username"].'</td>
    					<td>1</td>
    					<td>1</td>
    				</tr>';    
    } 


} // End num users	

cliprz::system(database)->free_result($query_users);

?>

			</tbody>
		</table>