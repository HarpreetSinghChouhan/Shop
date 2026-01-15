<?php
class coupon
{
    public static function findCoupon($token, $conn)
    {
        $sql = "SELECT * FROM discount WHERE token =?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $token);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
