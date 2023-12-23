<?php
function VarExist($var)
{
    if (isset($var)) {
        return $var;
    } else {
        echo '<script> alert("Enter fields correctly!"); </script>';
        header("location:../../index.php");
    }
}



function DBConnect()
{
    $dbhost = "127.0.0.1";
    $dbname = "manouche";
    $dbuser = "root";
    $dbpass = "";
    $db = null;
    try {
        $db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        $db = null;
        die();
    }
    return $db;
}


$user = new stdClass();
$user->email = VarExist($_POST["email"]);
$user->pass = VarExist($_POST["password"]);
$user->un = VarExist($_POST["username"]);
$user->fn = VarExist($_POST["fname"]);
$user->ln = VarExist($_POST["lname"]);


function addUser($user)
{

    $db = DBConnect();
    $query = "INSERT INTO users (username,password, permission, email, firstname, lastname) VALUES ('$user->un','$user->pass', 0, '$user->email','$user->fn','$user->ln')";
    echo $query;
    $stmt = $db->query($query);
    if ($stmt->rowCount() > 0) {
        session_start();
        $_SESSION["id"] = $db->lastInsertId();
        $_SESSION["username"] = $user->un;
        return 1;
    } else {
        return 0;
    }
}
if(addUser($user)==1) {
    header("location: ../../index.php");
}


?>