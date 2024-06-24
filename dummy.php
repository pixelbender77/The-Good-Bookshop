<div class="my-header" >
                <?php if (isset($user)): ?>
                <!-- user profile icon -->
                <a class="navbar-profil" href="view-profile.php?id=<?= $user["id"]; ?>" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user-circle"></i>
                </a>
                <!-- print login or sign up if user is not logged in -->
                <?php else: ?>
                <ul>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Log in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signup.html">Sign up</a>
                    </li>
                </ul>
            <?php endif; ?>
            <a class="navbar-logo" href="index.php"><img src="assets/logo_brown.png" style="width: 100px; height: auto; "></a>
            
            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->
            
            <ul class="nav-items">
                <li class="nav-item">
                    <a class="nav-link" href="catalog.php">Catalog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="orders.php">Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php">Cart</a>
                </li>
                <?php if (isset($user) && $user["is_admin"]): ?>
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Admin</a>
                </li>
                <?php endif; ?>
            </ul>
    
        </div>
<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Admin | Dashboard</title>
    <style>
        table td, table th {
            vertical-align: middle;
            text-align: center;
            padding: 20px!important;
        }
        .alert {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container my-4">
        <header class="d-flex justify-content-between my-4">
            <h1>Dashboard</h1>
            <div>
                <a href="create.php" class="btn btn-secondary"><i class="fas fa-plus-circle"></i>   Add a Book</a>
            </div>
        </header>
        
        <?php
        session_start();
        if (isset($_SESSION["create"])) {
        ?>
        <div class="alert alert-success">
            <?php echo $_SESSION["create"]; ?>
        </div>
        <?php unset($_SESSION["create"]); } ?>
        
        <?php if (isset($_SESSION["update"])) { ?>
        <div class="alert alert-success">
            <?php echo $_SESSION["update"]; ?>
        </div>
        <?php unset($_SESSION["update"]); } ?>
        
        <?php if (isset($_SESSION["delete"])) { ?>
        <div class="alert alert-success">
            <?php echo $_SESSION["delete"]; ?>
        </div>
        <?php unset($_SESSION["delete"]); } ?>
        
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('database.php');
                $sqlSelect = "SELECT * FROM books";
                $result = mysqli_query($mysqli, $sqlSelect);
                while ($data = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td><?php echo $data['id']; ?></td>
                    <td><?php echo $data['title']; ?></td>
                    <td><?php echo $data['author']; ?></td>
                    <td><?php echo $data['price']; ?> FCFA</td>
                    <td>
                        <a href="view.php?id=<?php echo $data['id']; ?>" class="btn"><i class="fas fa-eye"></i></a>
                        <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn"><i class="fas fa-edit"></i></a>
                        <a href="delete.php?id=<?php echo $data['id']; ?>" class="btn "><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html> -->
