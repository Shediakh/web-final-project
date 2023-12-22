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

    $prod = new stdClass();
    $prod->p_name = VarExist($_POST["product_name"]);
    $prod->p_price = VarExist($_POST["product_price"]);
    $prod->p_desc = VarExist($_POST["product_desc"]);
    $prod->p_img = VarExist($_POST["product_image"]);

    $query = "INSERT INTO (name, description, price, image) VALUES(".$prod->p_name.",".$prod->desc.",".$prod->price.",".$prod->p_img.");";
    $stmt = $db->query($query);


?>