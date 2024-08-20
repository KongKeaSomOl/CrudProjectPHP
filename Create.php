<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
</head>
<body>
    <div class="position-absolute top-50 start-50 translate-middle">
        <h2 class="mb-3">Create User </h2>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input 
                type="text"
                id="username"
                name="username"
                class="form-control"
                require>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input 
                type="email"
                id="email"
                name="email"
                class="form-control"
                require>
            </div>
            <button type="submit" name="create" class="btn  btn-primary">Create</button>
        </form>
</div>
</body>
</html>
<?php
include "db.php";
if(isset($_POST['create'])){
    $username = $_POST['username'];
    $email = $_POST['email'];

    $sql= "INSERT INTO user (username, email)
            VALUES ('$username', '$email')";
        $isSuccess =  $connection->query($sql);
        if($isSuccess) {
            // echo "Added Successfully";
            header("Location: read.php");
            exit();
        }
}
?>