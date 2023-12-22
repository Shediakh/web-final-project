<?php
require_once("../common/commonFunctions.php");


function addItem($item){
    $db=DBConnect();
    $query="INSERT INTO menu (`name`,`description`,`price`,`image`) VALUES ()";
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


function FetchUsers(){
    $db=DBConnect();
    $query="SELECT ID, USERNAME,EMAIL,IS_ACTIVE FROM tbl_users";
    $stmt=$db->query($query);
    $a_users=array();
    while ($obj = $stmt->fetch(PDO::FETCH_OBJ)) {
		$a_users[]=$obj;
	}
    return $a_users;
}

function DeleteUser($id){
    $db=DBConnect();
    $query="DELETE FROM tbl_users where ID=$id";
    $stmt=$db->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount()>0){
        return 1;
    }else{
        return 0;
    }
}

function ChangePass($newPass){
    $db=DBConnect();
    $query="UPDATE tbl_users SET(`PASSWORD`=PASSWORD('$newPass'),`MODIFICATION_DATE`=NOW())";
    //echo $query;
    $stmt=$db->query($query);
}

function ChangeStatus($id,$status){
    $db=DBConnect();
    $query="UPDATE tbl_users SET `IS_ACTIVE`=$status,`MODIFICATION_DATE`=NOW() where ID=$id";
    $stmt=$db->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount()>0){
        return $status;
    }else{
        return -1;
    }
}


?>