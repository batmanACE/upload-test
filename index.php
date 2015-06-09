<?php 

#1 Load Libraries
	require_once 'libraries/form.lib.php';
	require_once 'libraries/upload.lib.php';
	require_once 'libraries/url.lib.php';



#2 Logic

	#if any files were uploaded
	if($_FILES){

		# Get the temp name, and the file name
		$tmp = $_FILES['file']['tmp_name'][0];
		$filename = $_FILES['file']['name'][0];

		# Move the files into the 'uploads' folder
		move_uploaded_file($tmp, 'uploads/'.$filename);

		# redirect to the newly updated file
		URL::redirect('uploads/'.$filename);
	}






#3 Load Views (after this php tag)
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Upload Files with PHP</title>
</head>
<body>
	
	<h1>Upload Files PHP</h1>

	<?= Form::open_upload() ?>

		<div class="form-group">
			<?= Form::label('file', 'File') ?>
			<?= Form::file() ?>
		</div>

		<?= Form::submit() ?>

	<?= Form::close() ?>

</body>
</html>

