<?php
function VarExist($var){
    if (isset($var)){
        return $var;
    }else{
        header("location:../index.php");
    }
}



function DBConnect(){
    $dbhost="127.0.0.1";
    $dbname="manouche";
    $dbuser="root";
    $dbpass="root";
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

?>