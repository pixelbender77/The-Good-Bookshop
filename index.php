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
    <link rel="stylesheet" href="style.css">
    
    
</head>
<body >
    <?php include 'header.php'; ?>
    
    <div class="my-container"  >
        <?php if (isset($user)): ?>
            <h4 style="margin-top: 40px;">Welcome <?= htmlspecialchars($user["name"]) ?>!</h4>
        <?php endif; ?> 
            <!-- HERO SECTION -->
            <div class="image-text-element hero" >
                <div class="image-section hero-img-section">
                    <img  src="assets/illustration_1.png">
                </div>
                <div class="text-section">
                    <h3>The Books you need</h3>
                    <p> Transform your life with our off-the-shelf books. We have the books you need, just that. Discover their large varieties. Browse our catalogue , search books , get books by genre and add them to your cart.</p>
                    <a href="catalog.php" class="link-button">CATALOG</a>
                </div>
                <a id="skip-hero"  href="#skip-hero" class="scroll-down-icon"><i class="fas fa-arrow-down"></i></a>
            </div>
            <!-- ABOUT -->

            <div class="image-text-element row-reverse">
                <div class="image-section">
                    <img src="assets/book_animation.gif">
                </div>
                <div class="text-section">
                    <h3 >Welcome onboard!</h3>
                    <p> Welcome to The Good BookShop, your one-stop shop for all the books you'll ever need! Whether you're a seasoned bibliophile or just starting your literary journey, we have something to spark your imagination and keep you turning pages.</p>
                </div>
            </div>
            <hr>
            
            <div class="image-text-element">
                <div class="image-section">
                    <img src="assets/animation_2.gif">
                </div>
                <div class="text-section">
                    <h3>Discover our off the shelf books</h3>
                    <p>Transform your life with our off-the-shelf books. We have the books you need, just that. Discover their large varieties. Browse our catalogue , search books , get books by genre and add them to your cart<a style="color: var(--ACCENT);" href="catalog.php">Catalog</a></p>
                </div>
            </div>
            
    </div> 
    <?php include 'footer.php'; ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2IWO6Io5RkycJ2mLNIGeLZ6I2FQnmWgtiJEHcNf5Wq6p6YfRvH+zB5f8GDr" crossorigin="anonymous"></script>
</body>
</html>

