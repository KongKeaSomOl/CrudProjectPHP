<?php
    include "db.php";
    $sql = "SELECT * FROM user";
    $result = $connection->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Read User</title>
</head>
<body>
    <div class="Container m-5">
        <h2 class="mt-4 mb-3">User Info</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
         <?php
                if($result->num_rows >0){
                    while($row= $result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>" .$row['id']."</td>";
                        echo "<td>" .$row['username']."</td>";
                        echo "<td>" .$row['email']."</td>";
                        echo "<td>";
                        echo "<a href='update.php?id={$row['id']}' class='btn btn-primary'>Update</a>&nbsp";
                        echo "<a href='delete.php?id={$row['id']}' class='btn btn-danger'>Delete</a>";
                        echo  "</td>";
                        echo "</tr>";
                }
            }
         ?>
         
            </tbody>
        </table>
        <a href="create.php" class="btn btn-success">Create</a>
    </div>
</body>
</html>