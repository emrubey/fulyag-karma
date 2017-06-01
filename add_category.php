<?php
	include 'DBO/BusinessTier.php';
  $BT = new BusinessTier();

  $categoryName					= $_GET['categoryName'];

  if (categoryName != "") {
      $BT->insertCategory($categoryName);

      // sayfaya geri yönlendirme
      header('Location: admin.php?msg=success');
      exit;
    }
?>
