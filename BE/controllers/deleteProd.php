<?php
    function VarExist($var){
        if (isset($var)){
            return $var;
        }else{
            header("location:../../index.php");
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
    $p_name = VarExist($_POST['product_name']);
    $query = $db->prepare("DELETE FROM menu WHERE name = :p_name");

    $query->bindParam(':p_name', $p_name, PDO::PARAM_STR);

    $query->execute();

    header('location:../../prods.php');

?>