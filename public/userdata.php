<?php
include '../views/layouts/headhtml.php';
include '../views/layouts/action.php';
include '../app/config/database.php';
$sql = "SELECT * FROM users";
$result = mysqli_query($conn,$sql);
?>
<main class="" >
    <div class="container p-5" >
       <table class="table  table-border" >
        <thead>
            <tr>
                <th>ID</th>
                <th>PROFILE IMAGE</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        while($row = $result->fetch_assoc()){
        ?><tr  >
        <td class="p-3" ><?php echo $row['id'] ?></td>
        <td class="p-3" > <img src="../public/<?php echo $row['FilePath'] ?>" alt="" width="70" class="rounded-circle " srcset=""></td>
        <td class="p-3" ><?php echo $row['name'] ?></td>
        <td class="p-3" ><?php echo $row['email'] ?></td>
        <td class="p-3" ><div class="d-flex" ><a href="../public/edituser.php?id=<?php echo $row['email'] ?>"><input type="button" value="Edit" class="pe-4 ps-4 me-2 ms-3 btn btn-primary"></a>
        <a href="../app/controllers/userdetelecontroller.php?id=<?php echo $row['id'] ?>"><input type="button" value="Delete" class="pe-4 ps-4 me-2 ms-3 btn btn-danger"></a></div></td>
        </tr>
        <?php } ?> 
        </tbody>
       </table>
      
    </div>
</main>
<?php 
include '../views/layouts/footer.php';
?>