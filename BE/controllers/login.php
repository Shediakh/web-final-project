<?php

function VarExist($var)
{
    if (isset($var)) {
        return $var;
    } else {
        header("location:../index.php");
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

$db = DBConnect();

$user = new stdClass();
$user->pass = VarExist($_POST["password"]);
$user->un = VarExist($_POST["username"]);

$query = "SELECT username, password FROM users";
$stmt = $db->query($query);
$arr = array();
while ($obj = $stmt->fetch(PDO::FETCH_OBJ)) {
    $arr[] = $obj;
}
print_r($arr);
// for ($i = 0; $i < sizeof($arr); $i++) {
//     if($un==$arr[$i]->username && password_verify($arr[$i]->password, $pass)) {

//     }
// }


?>
