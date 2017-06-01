<?php
	include 'DBO/BusinessTier.php';
  $BT = new BusinessTier();

	$target_dir = "img/deneme/";
	$target_file = $target_dir . basename($_FILES["newsImage"]['name']);
	$uploadOk = 1;

	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST['addNews'])) {
	    $check = getimagesize($_FILES['newsImage']['tmp_name']);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	}
	else {
	    if (move_uploaded_file($_FILES["newsImage"]["tmp_name"], $target_file)) {
	        echo "The file ". basename( $_FILES["newsImage"]["name"]). " has been uploaded.";
	    }
			else {
	        echo "Sorry, there was an error uploading your file.";
  		}
	}

  $newsName					= $_POST['newsName'];
  $newsDescription	= $_POST['newsDescription'];
  $productImage			= basename( $_FILES["newsImage"]["name"]);

  if ($newsName != "" && $newsDescription != "") {
        $BT->insertNews($newsName, $newsDescription, $productImage);

        // sayfaya geri yönlendirme
        header('Location: admin.php?msg=success');
        exit;
      }
?>
