<?php
	include 'DBO/BusinessTier.php';
  $BT = new BusinessTier();

	$target_dir = "img/deneme/";
	$target_file = $target_dir . basename($_FILES["brandImage"]['name']);
	$uploadOk = 1;

	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST['addBrand'])) {
	    $check = getimagesize($_FILES['brandImage']['tmp_name']);
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
	    if (move_uploaded_file($_FILES["brandImage"]["tmp_name"], $target_file)) {
	        echo "The file ". basename( $_FILES["brandImage"]["name"]). " has been uploaded.";
	    }
			else {
	        echo "Sorry, there was an error uploading your file.";
  		}
	}

  $name					= $_POST['brandName'];
  $description	= $_POST['brandDescription'];
  $logo_path		= basename( $_FILES["brandImage"]["name"]);


  if ($name != "" && $description != "") {
        $BT->insertBrands($name, $logo_path, $description);

        // sayfaya geri yönlendirme
        //header('Location: admin.php');
        //exit;
      }
?>
