<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: #E4E4E4;
        }
        .profile-card {
            max-width: 600px;
            margin: auto;
            padding: 30px;
            border-radius: 15px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            text-align: center;
            position: relative;
            top: 50px;
        }
        .profile-card img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 20px;
        }
        .profile-card h3 {
            margin-bottom: 10px;
            color: #534741;
        }
        .profile-card h4 {
            color: gray;
            margin-bottom: 20px;
        }
        .btn-back {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: #534741;
            color: #fff;
        }
        .btn-edit {
            background-color: #534741;
            border: none;
        }
        .btn-edit:hover {
            background-color: #C7B299;
        }
        .logout-link {
            color: #534741;
            text-decoration: none;
        }
        .logout-link:hover {
            color: #C7B299;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container mt-5">
        <a href="index.php" class="btn btn-secondary btn-back"><i class="fas fa-arrow-left"></i> Back</a>
    
    <?php
    include_once("database.php");
    
    // Retrieve the user ID from the URL
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    if ($id) {
        $query = "SELECT * FROM user WHERE id=$id";
        $result = mysqli_query($mysqli, $query);
        if ($result) {
            $row = mysqli_fetch_array($result);
            $name = htmlspecialchars($row["name"]);
            $email = htmlspecialchars($row["email"]);
            ?>
            <div class="profile-card mt-5">
                <img src="assets/profile.png" alt="Profile Image" class="img-thumbnail">
                <h3><?php echo $name; ?></h3>
                <h4><?php echo $email; ?></h4>
                <a href="edit-profile.php?id=<?php echo $id; ?>" class="btn btn-info btn-edit mb-4"><i class="fas fa-edit"></i> Edit Profile</a>
                <p><a href="logout.php" class="logout-link"><i class="fas fa-sign-out-alt"></i> Log out</a></p>
            </div>
            <?php
        } else {
            echo "<p class='text-danger'>User not found.</p>";
        }
    } else {
        echo "<p class='text-danger'>Invalid user ID.</p>";
    }
    ?>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
