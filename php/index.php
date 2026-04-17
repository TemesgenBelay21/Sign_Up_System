<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign_Up_System</title>
    <link rel="stylesheet" href="../css/Style.css">
</head>
<body>
  <div class="container">

    <!-- Login -->
    <div class="form-box">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <label>Email</label>
            <input type="email" name="email" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>

    <!-- Signup -->
    <div class="form-box">
        <h2>Signup</h2>
        <form action="signup.php" method="POST">
            <label>Username</label>
            <input type="text" name="username" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <button type="submit">Signup</button>
        </form>
    </div>

</div>

</body>
</html>


