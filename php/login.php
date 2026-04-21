<?php

session_start();

require_once "../config/database.php";
$errors = [];
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = strtolower(trim($_POST['email']));
    $password = trim($_POST['password']);

    if(empty($email)) {
        $errors[] = "email is required";
    }
    
    if(empty($password)) {
        $errors[] = "password is required";
    }

    if(!filter_Var($email,FILTER_VALIDATE_EMAIL)) {
        $errors[] = "invalid email format";
    }
     
    
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
        exit;
    }
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);


    IF(!$user) {
        die("User not found");
    }

    if(!password_verify($password, $user['password'])){
        die("incorrect password");
    }

    $_SESSION['user_id'] = $user['id'];
    $_SeSSION['username'] = $user['username'];


    header("location:dashboard.php");
    exit;

}
?>