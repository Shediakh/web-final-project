<?php
function DBConnect(){
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

function addItem($user){
    $db=DBConnect();
    $query="INSERT INTO users (`id`,`username`,`password`,``) VALUES ('$item->name','$item->description','$item->price','$item->image', )";
    //echo $query;
    $stmt=$db->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount()>0){
        session_start();
        $_SESSION["id"]=$db->lastInsertId();
        $_SESSION["username"]=$user->username;
        return 1;
    }else{
        return 0;
    }
}


function getItems(){
    $db=DBConnect();
    $query="SELECT * FROM menu";
    $stmt=$db->query($query);
    $arr=array();
    while ($obj = $stmt->fetch(PDO::FETCH_OBJ)) {
		$arr[]=$obj;
	}
    return $arr;
}


// function DeleteUser($id){
//     $db=DBConnect();
//     $query="DELETE FROM tbl_users where ID=$id";
//     $stmt=$db->prepare($query);
//     $stmt->execute();
//     if ($stmt->rowCount()>0){
//         return 1;
//     }else{
//         return 0;
//     }
// }

// function ChangePass($newPass){
//     $db=DBConnect();
//     $query="UPDATE tbl_users SET(`PASSWORD`=PASSWORD('$newPass'),`MODIFICATION_DATE`=NOW())";
//     //echo $query;
//     $stmt=$db->query($query);
// }

// function ChangeStatus($id,$status){
//     $db=DBConnect();
//     $query="UPDATE tbl_users SET `IS_ACTIVE`=$status,`MODIFICATION_DATE`=NOW() where ID=$id";
//     $stmt=$db->prepare($query);
//     $stmt->execute();
//     if ($stmt->rowCount()>0){
//         return $status;
//     }else{
//         return -1;
//     }
// }


// ?>