<?php
if (isset($_GET['id'])) {
include("database.php");
$id = $_GET['id'];
$sql = "DELETE FROM books WHERE id='$id'";
if(mysqli_query($mysqli,$sql)){
    session_start();
    $_SESSION["delete"] = "Book Deleted Successfully!";
    header("Location:dashboard.php");
}else{
    die("Something went wrong");
}
}else{
    echo "Book does not exist";
}
?>