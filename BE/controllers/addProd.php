<?php
   function VarExist($var){
    if (isset($var)){
        return $var;
    }else{
        header("location:../index.php");
    }
}



function DBConnect() {
    $dbhost="127.0.0.1";
    $dbname="manouche";
    $dbuser="root";
    $dbpass="";
    $db=null;
    try {
        $db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);		
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        $db=null;
        die();
    }
    return $db;
}

    $db = DBConnect();
    $prod = new stdClass();
    $prod->p_name = VarExist($_POST["product_name"]);
    $prod->p_price = VarExist($_POST["product_price"]);
    $prod->p_desc = VarExist($_POST["product_desc"]);
    $prod->p_img = VarExist($_FILES["product_image"]["name"]);
    $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
    $product_image_folder = '../../img/menu/' . $prod->p_img;
   
    $query = "INSERT INTO menu (name, description, price, image) VALUES('".$prod->p_name."','".$prod->p_desc."','".$prod->p_price."','".$product_image_folder."');";
    $stmt = $db->query($query);
    move_uploaded_file($product_image_tmp_name,$product_image_folder);
    header('location:../../prods.php');
?>