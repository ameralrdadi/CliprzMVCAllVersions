<a href="../add_thread" style="font-family: Tahoma; padding: 20px; color">أضافة موضوع</a><br /><br />

<table width="70%">

<?php 
if(cliprz::system(database)->num_rows($query_threads) == 0)
{
echo '	<thead>
				<tr class="sec_index">
					<td colspan="5">رسالة خطاء</td>
				</tr>
			</thead>	
			<tbody>
				<tr class="sec_key">
					<td>لا يوجد موضوع</td>
				</tr>';    
}
else
{

?>
	
			<thead>
				<tr class="sec_index">
					<td colspan="6">مواضيع القسم</td>
				</tr>
			</thead>
			<tbody>
    			<tr class="sec_key">
					<td>#</td>
					<td>الموضوع</td>
					<td>الكاتب</td>
					<td>الردود</td>
					<td>الزيارات</td>
				</tr>
<?php

$counter = 0;
    
    while($row_threads = cliprz::system(database)->fetch_assoc($query_threads))
    {
    
        $counter++;
        
        echo '<tr>
        				<td>'.$counter.'</td>
        				<td><a href="../show_thread/'.$row_threads["id"].'">'.$row_threads["title_thread"].'</a></td>
        				<td>'.$row_threads["username"].'</td>
        				<td>2</td>
        				<td>5</td>
        			</tr>';    
    }

} // End nun threads

cliprz::system(database)->free_result($query_threads);


?>	
				
			</tbody>
		</table>
