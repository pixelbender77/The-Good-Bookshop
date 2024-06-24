<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    
    <title>Edit Profile</title>
    <style>
        body {
            background-color: #E4E4E4;
        }
        .btn-back {
            background-color: #534741;
            color: #fff;
        }
        .btn-back:hover {
            background-color: #C7B299;
        }
        .form-control {
            border-radius: 10px;
        }
        .btn-primary {
            background-color: #534741;
            border: none;
        }
        .btn-primary:hover {
            background-color: #C7B299;
        }
        .form-container {
            max-width: 600px;
            margin: auto;
            padding: 30px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        header {
            text-align: center;
        }
        header h1 {
            color: #534741;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <header class="d-flex justify-content-between align-items-center my-4">
            <div>
                <a href="view-profile.php?id=<?php echo $_GET["id"]; ?>" class="btn btn-secondary btn-back"><i class="fas fa-arrow-left"></i> Back</a>
            </div>
            <h1>Edit profil Information</h1>
            <div></div>
        </header>
        <div class="form-container">
            <form action="process.php" method="post">
                <?php 
                if (isset($_GET['id'])) {
                    include("database.php");
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM user WHERE id=$id";
                    $result = mysqli_query($mysqli, $sql);
                    $row = mysqli_fetch_array($result);
                    ?>
                    <div class="form-elemnt my-4">
                        <input type="text" class="form-control" name="name" placeholder="Username" value="<?php echo $row["name"]; ?>">
                    </div>
                    <div class="form-elemnt my-4">
                        <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $row["email"]; ?>">
                    </div>
                    <div class="form-elemnt my-4">
                        <input type="password" class="form-control" name="password" placeholder="Enter new password">
                    </div>
                    <div class="form-elemnt my-4">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm new password">
                    </div>
                    <input type="hidden" value="<?php echo $id; ?>" name="id">
                    <div class="form-element my-4">
                        <input type="submit" name="edit-user" value="Edit User" class="btn btn-primary">
                    </div>
                    <?php
                } else {
                    echo "<h3 class='text-danger'>User not found</h3>";
                }
                ?>
            </form>
        </div>
    </div>
</body>
</html>
