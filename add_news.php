<?php
	include 'DBO/BusinessTier.php';
  $BT = new BusinessTier();

  $newsName					= $_GET['newsName'];
  $newsDescription	= $_GET['newsDescription'];
  $productImage			= 'imagePath';
  //$handle = fopen($_FILES["productImage"]["tmp_name"], 'r');


  if ($newsName != "" && $newsDescription != "" &&
      $productImage != "") {
        $BT->insertNews($newsName, $newsDescription, $productImage);

        // sayfaya geri yönlendirme
        header('Location: admin.php?msg=success');
        exit;
      }
?>
