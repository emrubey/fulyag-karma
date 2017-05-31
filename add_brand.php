<?php
	include 'DBO/BusinessTier.php';
  $BT = new BusinessTier();

  $name					= $_GET['brandName'];
  $description	= $_GET['brandDescription'];
  $logo_path		= 'imagePath';
	$user_id 			= 1;
  //$handle = fopen($_FILES["productImage"]["tmp_name"], 'r');


  if ($name != "" && $logo_path != "" &&
      $description != "" && $user_id != "") {
        $BT->insertBrands($name, $logo_path, $description);

        // sayfaya geri yönlendirme
        header('Location: admin.php?msg=success');
        exit;
      }
?>
