<?php
	include 'DBO/BusinessTier.php';
  $BT = new BusinessTier();

	$target_dir = "img/deneme/";
	$target_file = $target_dir . basename($_FILES["productImage"]['name']);
	$uploadOk = 1;

	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST['addProduct'])) {
	    $check = getimagesize($_FILES['productImage']['tmp_name']);
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
	    if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $target_file)) {
	        echo "The file ". basename( $_FILES["productImage"]["name"]). " has been uploaded.";
	    }
			else {
	        echo "Sorry, there was an error uploading your file.";
  		}
	}

  $brandId            = $_POST['selectBrand'];
  $categoryId         = $_POST['selectCat'];
	$productName        = $_POST['productName'];
  $productDescription = $_POST['productDescription'];
  $productImage       = basename( $_FILES["productImage"]["name"]);


  if ($brandId != "" && $categoryId != "" &&
      $productName != "" && $productDescription != "") {
        $BT->insertProducts($productName, $brandId, $categoryId,
                            $productDescription, $productImage);

        // sayfaya geri yönlendirme
        header('Location: admin.php?msg=success');
        exit;
      }
?>
