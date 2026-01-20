<?php
class card{
    public static function foundusercard($user_id,$conn){
        $sql = "SELECT * FROM `card` WHERE user_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i',$user_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    public static function deleteAllCard($user_id,$conn){
        $sql = "DELETE FROM card WHERE user_id=$user_id";
        mysqli_query($conn,$sql);
        return "data are delete";
    }
}
