<?php

	include 'DBConnect.php';

	class BusinessTier{

		function conn() {
			$DB = new DBConnect();
			$DB->conn();
		}

		function close() {
			$DB = new DBConnect();
			$DB->close();
		}

		function getAllBrands() {
			$this->conn();
			$query = "SELECT * FROM tbl_brands";
			$sorgu = mysql_query($query);
			return $sorgu;
		}

		function getBrandsById($id) {
			$this->conn();
			$query = "SELECT * FROM tbl_brands WHERE id = $id";
			$sorgu = mysql_query($query);
			return $sorgu;
		}

		function getAllCategories() {
			$this->conn();
			$query = "SELECT * FROM tbl_category";
			$sorgu = mysql_query($query);
			return $sorgu;
		}

		function getAllNews() {
			$this->conn();
			$query = "SELECT * FROM tbl_news";
			$sorgu = mysql_query($query);
			return $sorgu;
		}

		function getAllReferences() {
			$this->conn();
			$query = "SELECT * FROM tbl_references";
			$sorgu = mysql_query($query);
			return $sorgu;
		}

		function getAllProducts() {
			$this->conn();
			$query = "SELECT * FROM tbl_products";
			$sorgu = mysql_query($query);
			return $sorgu;
		}

		function getAllProductsByIds($brand_id, $category_id) {
			$this->conn();
			$query = "SELECT * FROM tbl_products WHERE brand_id = '$brand_id' AND category_id = '$category_id'";
			$sorgu = mysql_query($query);
			return $sorgu;
		}

		function insertBrands($name, $logo_path, $description) {
			$this->conn();
			$sql = "INSERT INTO tbl_brands(name, logo_path, description)
			 VALUES('$name','$logo_path','$description')";
  		mysql_query($sql);
  		echo "<script>alert(' Perfect !')</script>";
	  	$this->close();
		}

		function insertCategory($name) {
			$this->conn();
			$sql = "INSERT INTO tbl_category(name)
			 VALUES('$name')";
  		mysql_query($sql);
  		echo "<script>alert(' Perfect !')</script>";
	  	$this->close();
		}

		function insertNews($title, $description, $image_path) {
			$this->conn();
			$sql = "INSERT INTO tbl_news(title, description, image_path)
			 VALUES('$title','$description','$image_path')";
  		mysql_query($sql);
	  	$this->close();
		}

		function insertReferences($name, $description, $image_path) {
			$this->conn();
			$sql = "INSERT INTO tbl_references(name, description, image_path)
			 VALUES('$name','$description','$image_path')";
  		mysql_query($sql);
	  	$this->close();
		}

		function insertProducts($name, $brand_id, $category_id, $description, $image_path) {
			$this->conn();
			$sql = "INSERT INTO tbl_products(name, brand_id, category_id, description, image_path)
			VALUES('$name',$brand_id,$category_id,'$description','$image_path')";
  		if(mysql_query($sql)) {
				echo "<script>alert(' OK !')</script>";
			}
			else {
				echo "<script>alert(' NOK !')</script>";
			}

	  	$this->close();
		}



		///////////////////////////////////////////////////////////////////////

		function getDate(){
			$Array=getdate();
			$day=$Array['mday'];
			$month=$Array['mon'];
			$year=$Array['year'];
			$date = $year.'-'.'0'.$month.'-'.$day;
			return $date;
		}

		function CheckUser($email, $password){
			$this->conn();
			$query = "SELECT COUNT(*) FROM TABLE_USER WHERE Email = '$email' AND Password = '$password'";
			$sorgu = mysql_query($query);
			$row = mysql_result($sorgu, 0);
			if($row == 0){
				return false;
			}
			else return true;
		}

		function GetUserID($email){
			$this->conn();
			$query = "SELECT * FROM TABLE_USER WHERE Email = '$email'";
			$sorgu = mysql_query($query);
			$row = mysql_fetch_array($sorgu);
			return $row['UserID'];
		}

		function GetUserName($UserID){
			$this->conn();
			$query = "SELECT * FROM TABLE_USER WHERE UserID = $UserID";
			$sorgu = mysql_query($query);
			$row = mysql_fetch_array($sorgu);
			$name = $row['Name'];
			$surname = $row['Surname'];
			return $name.' '.$surname;
		}

		function InsertUser($name, $surname,
		$address, $password, $email, $zipcode, $city, $town) {
			$this->conn();
			$sql = "SELECT COUNT(*) FROM TABLE_USER WHERE Email = '$email'";
		  	$sorgu= mysql_query($sql);
		  	$row = mysql_result($sorgu, 0);
		  	if($row == 0){
				$sql = "INSERT INTO TABLE_USER(Name, Surname, Address, Password, Email, ZipCode, City, Town)
				 VALUES('$name','$surname','$address','$password','$email','$zipcode','$city','$town')";
	    		mysql_query($sql);
	    		echo "<script>alert(' Perfect !')</script>";
		  	}
		  	else{
		  		echo "<script>alert('$email' + ' is already recorded !')</script>";
		  		include 'Default.php';
		  	}
		  	$this->close();
		}

		function UpdateUser($name, $surname, $address, $password, $email, $zipcode, $city, $town) {
			$this->conn();
			$sql = "UPDATE TABLE_USER SET Name = '$name', Surname = '$surname',
			ZipCode = '$zipcode', City = '$city', Town = '$town'
			WHERE Email = '$email'";
			mysql_query($sql);
			echo "<script>alert(Successfull !')</script>";
			include 'Default.php';
			$this->close();
		}

		function ForgetPassword($email) {
			$this->conn();
			$sql = "SELECT Password FROM TABLE_USER WHERE Email = '$email'";
			$sorgu = mysql_query($sql);
			$result = mysql_fetch_array($sorgu);
			return $result['Password'];
		}

		function ChangePassword($oldPassword, $newPassword, $email) {
			$this->conn();
			$sql = "SELECT Password FROM TABLE_USER WHERE Email = '$email'";
			$sorgu = mysql_query($sql);
			$row = mysql_fetch_array($sorgu);
			if($row['Password'] == $oldPassword){
				$sql = "UPDATE TABLE_USER SET Password = '$newPassword'
				WHERE Email = '$email'";
				return mysql_query($sql);
			}
			else{
				return false;
			}
			$this->close();
		}

		//TODO: to be implemented
		/*----------TABLE_MARK----------*/
		function InsertMark($MarkName, $StartDate, $EndDate, $Photo) {
			//TODO: firstly generate markid
			/*TODO: if startdate = date.now
			 			then record it, isactive = true
					else
						then record it, isactive = false*/
		}

		function SelectMarks(){
			$this->conn();
			$date = $this->getDate();
			$sql = "SELECT * FROM TABLE_MARK WHERE StartDate <= '$date' AND EndDate >= '$date'";
			$sorgu = mysql_query($sql);
			return $sorgu;
		}

		function SelectNextMarks(){
			$this->conn();
			$date = $this->getDate();
			$sql = "SELECT * FROM TABLE_MARK WHERE StartDate > '$date' AND EndDate >= '$date'";
			$sorgu = mysql_query($sql);
			return $sorgu;
		}

		function SelectMarkPhoto($MarkID){
			$this->conn();
			$sql = "SELECT * FROM TABLE_MARK WHERE MarkID = '$MarkID'";
			$sorgu = mysql_query($sql);
			$row = mysql_fetch_array($sorgu);
			return $row;
		}

		function SelectCategories($MarkID){
			$this->conn();
			$sql = "SELECT * FROM TABLE_CATEGORY WHERE MarkID = '$MarkID'";
			$sorgu = mysql_query($sql);
			return $sorgu;
		}

		function SelectProduct($CategoryID){
			$this->conn();
			$sql = "SELECT * FROM TABLE_PRODUCT WHERE CategoryID = '$CategoryID'";
			$sorgu = mysql_query($sql);
			return $sorgu;
		}

		function DetailsOfProduct($ProductID){
			$this->conn();
			$sql = "SELECT * FROM TABLE_PRODUCT WHERE ProductID = '$ProductID'";
			$sorgu = mysql_query($sql);
			$row = mysql_fetch_array($sorgu);
			return $row;
		}

		function DetailsOfSepet($ProductID, $UserID){
			$this->conn();
			$sql = "SELECT * FROM TABLE_SEPET WHERE ProductID = '$ProductID' AND UserID = $UserID";
			$sorgu = mysql_query($sql);
			$row = mysql_fetch_array($sorgu);
			return $row;
		}

		function IsCampaignActive($MarkName){
			/*TODO: return table_mark[isactive]*/
		}

		function DeleteMark($MarkName){
			/*TODO: if table_mark[enddate] < date.now
			 			then delete table_mark[markname]*/
		}



		/*---------TABLE_STOCK--------*/
		function InsertStock($StockID, $Size, $Stock) {

		}

		function UpdateStock($StockID, $Size, $Stock) {
			/*TODO: if table_stock[stock] = 0
			 			then return stock is finished.
			 		else then just update. */

		}
		/*---------TABLE_PRODUCT--------*/
		function InsertProduct($ProductName, $PriceBeforeSale, $PriceAfterSale) {
			/*TODO: generate productid and stockid. */
		}

		/*---------TABLE_SEPET--------*/
		function InsertSepet($UserID, $ProductID, $size, $adet ) {
			$this->conn();

			$query2 = "SELECT COUNT(*) FROM TABLE_SEPET WHERE ProductID = '$ProductID' AND Size = '$size'";
			$sorgu2 = mysql_query($query2);
			$row = mysql_result($sorgu2, 0);
			if($row == 0){
				$sql = "INSERT INTO TABLE_SEPET(ProductID, UserID, TotalNumber, Size)
				 	VALUES('$ProductID','$UserID', $adet,'$size')";
	    			mysql_query($sql);
			}
			else{
				$stock = $this->getStock($ProductID);
				$sizeQuery = "SELECT TotalNumber FROM TABLE_SEPET WHERE ProductID = '$ProductID' AND UserID = $UserID";
				$sorgu3 = mysql_query($sizeQuery);
				$oldRow = mysql_fetch_array($sorgu3);
				$oldAdet = $oldRow['TotalNumber'];
				$newAdet = $oldAdet + $adet;
				if($stock >= $newAdet){
					$sql = "UPDATE TABLE_SEPET SET TotalNumber = '$newAdet'
					WHERE UserID = '$UserID' AND ProductID = '$ProductID'
					AND Size = '$size'";
					mysql_query($sql);
				}
				else{
					return NULL;
				}
			}
	    	$query = "SELECT * FROM TABLE_SEPET WHERE UserID = '$UserID'";
	    	$sorgu= mysql_query($query);
	    	return $sorgu;
		}

		function getSepetID($UserID, $ProductID, $size, $adet){
			$this->conn();
			$sql = "SELECT SepetID FROM TABLE_SEPET WHERE ProductID = '$ProductID'
					AND Size = '$size' AND UserID = $UserID AND TotalNumber = $adet";
			mysql_query($sql);
		}

		function getSize($ProductID){
			$this->conn();
			$sql = "SELECT Size FROM TABLE_STOCK WHERE ProductID = '$ProductID'";
			$sorgu = mysql_query($sql);
			return $sorgu;
		}

		function getStock($ProductID){
			$this->conn();
			$sql = "SELECT * FROM TABLE_STOCK WHERE ProductID = '$ProductID'";
			$sorgu = mysql_query($sql);
			$row = mysql_fetch_array($sorgu);
			return $row['Number'];
		}

		function DecreaseStock($UserID){
			$this->conn();
			$sql = "SELECT * FROM TABLE_SEPET WHERE UserID = $UserID";
			$sorgu = mysql_query($sql);
			return $sorgu;
		}
	}
?>
