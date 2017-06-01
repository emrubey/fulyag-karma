<?php
	include 'DBO/BusinessTier.php';
  $BT = new BusinessTier();

	$target_dir = "img/deneme/";
	$target_file = $target_dir . basename($_FILES["referenceImage"]['name']);
	$uploadOk = 1;

	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST['addReference'])) {
	    $check = getimagesize($_FILES['referenceImage']['tmp_name']);
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
	    if (move_uploaded_file($_FILES["referenceImage"]["tmp_name"], $target_file)) {
	        echo "The file ". basename( $_FILES["referenceImage"]["name"]). " has been uploaded.";
	    }
			else {
	        echo "Sorry, there was an error uploading your file.";
  		}
	}

  $referenceName				= $_POST['referenceName'];
  $referenceDescription	= $_POST['referenceDescription'];
  $logo_path						= basename( $_FILES["referenceImage"]["name"]);


  if ($referenceName != "" && $referenceDescription != "") {
        $BT->insertReferences($referenceName, $referenceDescription, $logo_path);

        // sayfaya geri yönlendirme
        header('Location: admin.php?msg=success');
        exit;
      }
?>
