<?php
class Product
{
    public static function findmyProduct($id, $conn)
    {
        $sql = "SELECT * FROM productsapp WHERE productid=$id";
        // $stmt = $conn->prepare($sql);
        $result = mysqli_query($conn,$sql);
         $stmt = $result->fetch_assoc(); 
        // $stmt->bind_param("i", $id);
        // $stmt->execute();
        return $stmt;
    }
}
