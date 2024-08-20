<?php
include "db.php";

function getUserData($connection, $uid){
    $sql = "SELECT * FROM user
            WHERE id = '$uid'";
    $result = $connection->query($sql);
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        return [
            'username' => $row['username'],
            'email' => $row['email']
        ];
    }
    return null;
}

if(isset($_GET['id'])){
    $uid = $_GET['id'];
    $userData = getUserData($connection, $uid);
    if($userData){
        $username = $userData['username'];
        $email = $userData['email'];
    }
}

function updateUser($connection, $uid, $username, $email){
    $sql = "UPDATE user
            SET username = '$username',
                email = '$email'
            WHERE id = '$uid'";
    $isSuccess = $connection->query($sql);
    return $isSuccess;
}

if(isset($_POST['update'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $uid = $_GET['id']; // Ensure $_GET['id'] is set before using it
    $isSuccess = updateUser($connection, $uid, $username, $email);
    if($isSuccess){
        header("Location: read.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
</head>
<body>
    <div class="position-absolute top-50 start-50 translate-middle">
        <h2 class="mb-3">Update User </h2>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input 
                type="text"
                id="username"
                name="username"
                class="form-control"
                value="<?= $username; ?>"
                require>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input 
                type="email"
                id="email"
                name="email"
                class="form-control"
                value="<?= $email; ?>"
                require>
            </div>
            <button type="submit" name="update" class="btn  btn-primary">Update</button>
        </form>
</div>
</body>
</html>