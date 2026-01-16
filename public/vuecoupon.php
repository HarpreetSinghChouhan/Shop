<?php
require '../views/layouts/headhtml.php';
require '../views/layouts/action.php';
include '../app/config/database.php';
// print_r($conn);
$sql = "SELECT * FROM discount";
$result = mysqli_query($conn, $sql)
?>
<main class="mb-3">
    <div class="container mt-3">
        <table class="table table-border">
            <thead class="table-head" >
                <tr>
                    <th>Id</th>
                    <th>Token</th>
                    <th>Discount_Type</th>
                    <th>Discount_Value</th>
                    <th>Is_Used</th>
                    <th>Usable Token</th>
                    <th>Expires</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $id = 0;
                 while($row = $result->fetch_assoc()){?>
                  <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $row['token'] ?></td>
                    <td><?php echo $row['discount_type'] ?></td>
                    <td><?php echo $row['discount_value'] ?> </td>
                    <td><?php echo $row['is_used'] ?></td>
                    <td><?php echo $row['usable_token'] ?></td>
                    <td><?php echo $row['expires_at'] ?></td>
                  </tr>
                      
                <?php 
                $id++;
                }
                ?>
            </tbody>

        </table>
    </div>
</main>
<?php
require '../views/layouts/footer.php';

?>