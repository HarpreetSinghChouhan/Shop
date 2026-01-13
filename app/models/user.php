<?php

class User
{
    public static  function findByEmail($email, $conn)
    {
        $sql = "SELECT  * from users WHERE email=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    public static function findByUserId($UserId, $conn)
    {
        $sql = "SELECT * from users WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $UserId);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}

// class User1 {}
