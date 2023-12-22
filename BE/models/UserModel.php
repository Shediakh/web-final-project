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
    $user = new stdClass();
    $user->email =$_POST["email"];
    $user->pass = $_POST["password"];
    $user->un = $_POST["username"];
    $user->fn = $_POST["fname"];
    $user->ln = $_POST["lname"];
    print_r($user);

    $query="INSERT INTO users ('username','password', 'permission', 'email', 'firstname', 'lastname') VALUES ('".$user->un."',PASSOWRD($user->pass), '0', '$user->email','$user->fn', '$user->ln')";
    
    $stmt=$db->query($query);
    if ($stmt->rowCount()>0){
        session_start();
        $_SESSION["id"]=$db->lastInsertId();
        $_SESSION["username"]=$user->username;
        return 1;
    }else{
        return 0;
    }
 ?>