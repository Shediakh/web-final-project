<?php
    function changePermission($id, $permission) {

        $db=DBConnect();
        if($permission == 0) {
            $query="UPDATE users SET `permission`= 1 WHERE ID=$id";
        } else if($permission == 1) {
            $query="UPDATE users SET `permission`= 0 WHERE ID=$id";
        }
        
    $stmt=$db->query($query);
    }
?>