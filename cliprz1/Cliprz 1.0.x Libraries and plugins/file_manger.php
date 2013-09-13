<?php
if (isset($_FILES['zip'])){
	$errors = array();

	$zip =  new ZipArchive();

	$res = @$zip->open($_FILES['tmp_name']);
	if (strtolower(end(explode('.', $_FILES['zip']['name']))) !== 'zip'){
		$errors[] = 'عذراً هذا الملف ﻻ يحمل اللاحقة zip';
	}

	if ($_FILES['zip']['size'] > 104857600) {
		$errors[] = 'حجم الملف المرفوع اكبر من الحجم المسموح به وهو 100م.ب';
	}

	if ($res === TRUE) {
		//
	} else {

		$errors[] = 'عذراً حدث خطأ اثناء استخراج الملف';
	}

	if (empty($errors)) {
		$extracted_files = array();
		
		for ($i = 0; $i < $zip->numFiles; ++$i) {
			$entry_info = $zip->statIndex($i);
			
			$extracted_files[] = $entry_info['name'];
		}
		$zip->extractTo('./path'); // ملف اﻻستخراج
		$zip->close();
	}


}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html dir="rtl">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Zip</title>

</head>
<body>
<?php 
if (isset($errors)) {
	if (empty($errors)) {
		echo '<p>تم الرفع واﻻستخراج بنجاح :', implode(', ', $extracted_files),'.</p>';
	}else{
		foreach ($errors as $error){
			echo '<p>', $error, '</p>';
		}
	}
}
?>
<form action="" method="POST" enctype="multipart/form-data">
	<input type="file" name="zip" /> <input type="submit" value="رفع"
		name="upload" />
</form>
</body>
</html>