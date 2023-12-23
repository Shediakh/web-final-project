<?php
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

    function changePermission($id, $permission) {

        $db=DBConnect();
        if($permission == 0) {
            $query="UPDATE users SET `permission`= 1 WHERE ID=$id";
        } else if($permission == 1) {
            $query="UPDATE users SET `permission`= 0 WHERE ID=$id";
        }
        
    $stmt=$db->query($query);
    }

    $id = $_POST["id"];
    $permission = $_POST["permission"];
    echo $id;
    echo $permission;
    changePermission($id, $permission);
?>