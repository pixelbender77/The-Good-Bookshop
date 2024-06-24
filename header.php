<!-- Header Component-->
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/database.php";
    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="header.css">
    
    <style>
        body {
            padding-top: 56px; /* Navbar height */
        }
    </style>
</head>
<body>
    <header>
        <div id="scroll-watcher"></div>
        <ul id="navbar">
            <?php if (isset($user)): ?>
                <!-- user profile icon -->
                <a class="navbar-profil" href="view-profile.php?id=<?= $user["id"]; ?>" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user-circle"></i>
                </a>
                <!-- print login or sign up if user is not logged in -->
            <?php else: ?>
                <ul class="nav-items">
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Log in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signup.html">Sign up</a>
                    </li>
                </ul>    
            <?php endif; ?>

            
            <a class="navbar-logo" href="index.php"><img src="assets/logo_brown.png" ></a>
            
            <nav class="nav-links">
                <li><a href="catalog.php">Catalog</a></li>
                <li>
                    <a href="orders.php">Orders</a>
                </li>
                <li><a href="cart.php">Cart</a></li>
                <?php if (isset($user) && $user["is_admin"]): ?>
                    <li><a href="dashboard.php">Admin</a></li>
                <?php endif; ?>

            </nav>

        </ul>

    </header>
</body>
</html>
