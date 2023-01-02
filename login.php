<?php 
$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include("database.php");

    $sql = sprintf("SELECT * FROM admin_account
                    WHERE email = '%s'",
                   $connect->real_escape_string($_POST["email"]));

    $result = $connect->query($sql);
    $user = $result->fetch_assoc();

    if($user){
        if (password_verify($_POST["password"], $user["password"])) 
        {
            session_start();
            $_SESSION["user_id"] = $user["id"];
            header("Location: lnladmin.php");
            exit;
        }
    }
    $is_invalid = true;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Sacramento&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body class="hidden">
        <a href="index.html" class="home">Home</a>
        <div class="login-form-container">
            <h3>Lihim na Liham</h3>
            <form method="post">
                    <?php if ($is_invalid): ?>
                        <div class="em"><em>Wrong email or password!</em></div>
                    <?php endif; ?>
                    <input placeholder="Username" type="text" name="email" id="email"
                    value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
                    <br>
                    <input placeholder="Password" type="password" name="password" id="password">
                    <br>
                    <button>Login</button>
            </form>
        </div>
    <script src="js/app.js"></script>
</body>
</html>