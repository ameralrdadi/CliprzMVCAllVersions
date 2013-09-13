<?php
if(cliprz::system(database)->num_rows($query_show_thread) == 0)
{
    echo '		
    <table width="50%">
			<thead>
				<tr class="sec_index">
					<td colspan="5">رسالة النظام</td>
				</tr>
			</thead>
			<tbody>
						
				<tr class="sec_key">
					<td colspan="4">خظاء الموضوع غير موجود</td>
				</tr>

				</tr>
			</tbody>
			</table>';
}
else
{
?>

<p style="font-size: 20px; padding-right:10px; ">أسم الموضوع <?php // echo $title_thread; ?></p>

    <table width="95%">
				<tr>
					<td width="20%">
					Amer<br />
					Adminisert<br />
					2013/1/1 - 2:19PM<br />
					</td>
					<td>Test Post</td>
				</tr>

				<tr>
					<td width="20%">
					Cliprz<br />
					Adminisert<br />
					2013/1/1 - 2:19PM<br />
					</td>
					<td>
						Test Reply
						<br />
						Test Reply
						<br />
						Test Reply
						<br />
						Test Reply
						<br />
						Test Reply
						<br />
						Test Reply
						<br />	
					</td>
				</tr>	
				</table>


<?php    

      cliprz::system(view)->display("add_reply","replies");

}
?>

