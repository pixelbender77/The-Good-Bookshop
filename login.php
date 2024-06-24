<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"])); //real escape string is used to avoid SQL Injection attacks
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            
            header("Location: index.php");
            exit;
        }
    }
    
    $is_invalid = true;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    
    <style>
        body{
            background-color: var(--BG);
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .container {
            min-height: 500px;
            background-color: transparent;
            min-width: 500px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            padding: 10px;
            /*box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);*/
            align-self: center;
            margin: 50px 0;
        }

    .logo {
        width: 300px;
        height: auto;
        margin-top: 25px;
    }

    .title {
        color: var(--MAIN-DARK);
        font-family: serif;
    }

    .form {
        display: flex;
        flex-direction: column;
        gap: 15px;
        /* background-color: aqua; */
    }

    .form input {
        min-width: 300px;
        min-height: 50px;
        padding: 10px;
        padding-left: 20px;
        border: none;
        border-bottom: 2px solid var(--ACCENT);
        outline: none;
        background-color: tranparent;
        transition: all 0.4s ease-in;
    }

    .form input:focus-visible {
        background-color: transparent;
        border-bottom: 3px solid var(--ACCENT);
        
    }

    .link:any-link {
        color: var(--main-green);
        transition: all 0.3s ease-in;
    }

    .link:hover {
        letter-spacing: 1px;
        color: rgb(55, 178, 226);
    }

    .options {
        color: var(--title-gray);
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
        font-size: 0.8rem;
        margin-bottom: 30px;
    }

    .button {
        min-width: 80px;
        align-self: end;
        border-radius: 20px;
        border: none;
        padding: 10px;
        background-color: white;
        /* This black color is just a fallback. Notice that in normal circumstances this black color will not be seen. Instead depending on the type of Item, a corresponding color will be attributed*/
        color: var(--ACCENT);
        align-self: center;
        margin-top: 30px;
        margin-bottom: 20px;
        transition: all 0.1s ease-in;
        cursor: pointer;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);

    }

    .button:hover {
        background-color: var(--ACCENT);
        color: white;
    }
    </style>
</head>
<body>
    
    <?php if ($is_invalid): ?>
        <em>Invalid login</em>
    <?php endif; ?>
    <img class="logo" src="assets/logo_brown.png" alt='The Good BookShop Logo'/>
    <div class="container">
        
        <h1 class="title">LOGIN</h1>

        <form class="form" method="post">
            <input type="email" name="email" placeholder="Email" required/>
            <input type="password" name="password" placeholder="Password"  required/>

            <button class="button"> Login </button>
        </form>

        <section class="options">
            <p>Don&apos;t have an account? <a class="link" href="signup.html">Register</a></p>
        </section>      
    </div> 
    
</body>
</html>