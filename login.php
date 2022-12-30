<?php 
$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include("database.php");

    $sql = sprintf("SELECT * FROM admin
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
    <title>Login</title>
</head>
<body>
<div class="login-form-container">
            <?php if ($is_invalid): ?>
                <em>Wrong email or password!</em>
            <?php endif; ?>

            <form method="post">
                    <input placeholder="Username" type="text" name="email" id="email"
                    value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
                
                    <input placeholder="Password" type="password" name="password" id="password">

                    <button>Login</button>
            </form>
        </div>

</body>
</html>