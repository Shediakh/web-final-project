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


session_start();


$query = "SELECT id, username, password, permission FROM users";
$stmt = $db->query($query);
$arr = array();
while ($obj = $stmt->fetch(PDO::FETCH_OBJ)) {
    $arr[] = $obj;
}
$flag = false; 
$perm = 0;
for ($i = 0; $i < sizeof($arr); $i++) {
    if($user->un===$arr[$i]->username && $arr[$i]->password===$user->pass) {
        $flag = true;
        $_SESSION["permission"] = $arr[$i]->permission;
        break;
    }
}
print_r($arr);
if($flag) {
    header("location:../../home.php");
}
else {
    echo '<script> alert("User not found or incorrect password!"); </script>';
    echo '<script> window.location.replace("../../index.php");</script>';
}

?>
