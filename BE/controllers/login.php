<?php
function VarExist($var)
{
    if (isset($var)) {
        return $var;
    } else {
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

$db = DBConnect();

$user = new stdClass();
$user->pass = VarExist($_POST["password"]);
$user->un = VarExist($_POST["username"]);



$query = "SELECT id, username, password, permission FROM users";
$stmt = $db->query($query);
$arr = array();
while ($obj = $stmt->fetch(PDO::FETCH_OBJ)) {
    $arr[] = $obj;
}
$flag = false; 

for ($i = 0; $i < sizeof($arr); $i++) {
    if($user->un===$arr[$i]->username && $arr[$i]->password===$user->pass) {
        $flag = true;
        $perm = $arr[$i]->permission;
        break;
    }
}
if($flag) {
    session_start();
    $_SESSION["permission"] = $perm;
    $_SESSION["username"] = $user->un;
    header("location:../../home.php");
}
else {
    echo '<script> alert("User not found or incorrect password!"); </script>';
    echo '<script> window.location.replace("../../index.php");</script>';
}

?>
