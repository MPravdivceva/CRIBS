<?php
if (isset($_POST['submit'])) {
	$file = $_FILES['fileToUpload'];
	print_r($file);
	$fileName = $_FILES['fileToUpload']['name'];
	$fileTmpName = $_FILES['fileToUpload']['tmp_name'];
	$fileSize = $_FILES['fileToUpload']['size'];
	$fileError = $_FILES['fileToUpload']['error'];
	$fileType = $_FILES['fileToUpload']['type'];
	
	$fileExt = explode('.', $fileName); 
	$fileActualExt = strtolower(end($fileExt));
	
	$allowed = array('jpg', 'jpeg', 'png', 'pdf');
	
	if(in_array($fileActualExt, $allowed)) {
		if($fileError === 0) {
		 	if($fileSize < 10000000) {
				$fileNameNew = uniqid('', true).".".$fileActualExt;
				$fileDestination = 'uploads/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);	
				header("location: uploads.php?uploadsuccess");
	} else {
		echo "Your file is too large!"; 	
	}

	} else {
		echo "There was an error uploading your file!"; 	
	}

	} else {
		echo "You cannot upload files of this type!"; 
	}
	
}
?>


  