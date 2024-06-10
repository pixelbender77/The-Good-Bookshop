<?php
session_start();
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
    <style>
        body {
            padding-top: 56px; /* Navbar height */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" style="margin: 15px; padding: 10px; background-color: gray;">
        <div class="container-fluid" >
            <a class="navbar-brand" href="#"><img src="assets/logo.png" style="width: 100px; height: auto; "></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
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
                    <?php if (isset($user)): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="view-profile.php?id=<?= $user["id"]; ?>" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= htmlspecialchars($user["name"]) ?>
                        </a>
                    </li>
                    <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Log in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signup.html">Sign up</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <?php if (isset($user)): ?>
            <!-- <h4 style="margin-top: 40px;">Welcome <?= htmlspecialchars($user["name"]) ?>!</h4> -->
            <div class="d-flex justify-content-center align-items-center" style="margin-top: 80px;">
                <div style="width: 200px; height:auto; margin-right: 50px;">
                    <img src="assets/logo.png" style="width: 100%; height:auto;">
                </div>
                <div style="flex:2;">
                    <h3>Our books answer your questions.</h3>
                    <p style="color: gray; font-size: 1.2rem;">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati atque perspiciatis praesentium molestias eius sapiente veniam, sit vero nobis eligendi debitis, assumenda pariatur sapiente veniam, sit vero nobis eligendi debitis, assumenda pariatur dolores enim in iusto dolores enim in iusto quo quas aperiam! Visit our <a style="color: var(--ACCENT);" href="catalog.php">Catalog</a>
                    </p>
                </div>
            </div>
        <?php else: ?>
            <p><a href="login.php">Log in</a> or <a href="signup.html">Sign up</a></p>
        <?php endif; ?>
    </div>

    <footer class="bg-light text-center text-lg-start mt-5" style="position: absolute; bottom: 0; width: 100%;">
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">About Us</h5>
                    <p>
                        Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    </p>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Useful Links</h5>
                    <ul class="list-unstyled mb-0">
                        <li><a href="#!" class="text-dark">Privacy Policy</a></li>
                        <li><a href="#!" class="text-dark">Terms of Service</a></li>
                        <li><a href="#!" class="text-dark">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Follow Us</h5>
                    <ul class="list-unstyled">
                        <li><a href="#!" class="text-dark"><i class="fab fa-facebook-f"></i> Facebook</a></li>
                        <li><a href="#!" class="text-dark"><i class="fab fa-twitter"></i> Twitter</a></li>
                        <li><a href="#!" class="text-dark"><i class="fab fa-instagram"></i> Instagram</a></li>
                        <li><a href="#!" class="text-dark"><i class="fab fa-linkedin-in"></i> LinkedIn</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="text-center p-3 bg-dark text-white">
            © 2023 MyBookStore. All rights reserved.
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2IWO6Io5RkycJ2mLNIGeLZ6I2FQnmWgtiJEHcNf5Wq6p6YfRvH+zB5f8GDr" crossorigin="anonymous"></script>
</body>
</html>
