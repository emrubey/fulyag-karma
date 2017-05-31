<?php
	include 'DBO/BusinessTier.php';
  $BT = new BusinessTier();

  $referenceName				= $_GET['referenceName'];
  $referenceDescription	= $_GET['referenceDescription'];
  $logo_path						= 'imagePath';
  //$handle = fopen($_FILES["productImage"]["tmp_name"], 'r');


  if ($referenceName != "" && $referenceDescription != "" &&
      $logo_path != "") {
        $BT->insertReferences($referenceName, $referenceDescription, $logo_path);

        // sayfaya geri yönlendirme
        header('Location: admin.php?msg=success');
        exit;
      }
?>
