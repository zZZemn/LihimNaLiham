<?php 
session_start();
$search = false;

    if (isset($_SESSION["user_id"])) 
    {
        include("database.php");
        
        $sql = "SELECT * FROM admin_account
            WHERE id = {$_SESSION["user_id"]}";
        $result = $connect->query($sql);
        $user = $result->fetch_assoc();

        $liham = "SELECT * FROM message ORDER BY id DESC";
        $liham_result = $connect->query($liham);
    }

    if(isset($_POST['btnsearch']))
    {
        $searchValue = $_POST['search'];
        $searching = "SELECT * FROM message WHERE name = '$searchValue'";
        $searching_result = $connect->query($searching);
        $search = true;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Sacramento&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/admin-nav.css">
    <link rel="stylesheet" href="css/admin-letters.css">
    <title>Lihim na Liham</title>
</head>
<body>
    <?php if (isset($user)): ?>
        <nav>
            <a class="logo" href="lnladmin.php">Lihim na Liham</a>
            <hr>
            <a href="admin-letter.php" class="padding">Letters</a>
            <hr>
            <a href="logout.php" class="padding">Logout</a>
            <hr>
        </nav>

        <div class="letters-container">
            <form action="" method="post" class="frmsearch">
                <input type="text" name="search" id="search" class="search">
                <input type="submit" name="btnsearch" id="btnsearch" class="btnsearch" value="Search"> 
            </form>
        <?php  
            if($search == true)
            {
                if($searching_result->num_rows > 0)
                {
                    while($row = $searching_result->fetch_assoc())
                    {
                        echo "<div class='letters'><p class='name'>To: ".$row['name']."</p><br><hr><br><textarea readonly class='message'>".$row['message']."</textarea><div class='tnd'><em>".$row['time']."</em>-<em>".$row['date']."</em></div></div>";
                    } 
                }   
                else 
                {
                    echo "<div class='notFound'><h1>".$searchValue." not found</h1><a href='letters.php'>View all</a></div>";
                }
            }
            else {
                if($liham_result->num_rows > 0)
                {
                    while($row = $liham_result->fetch_assoc())
                    {
                        echo "<div class='letters'><p class='name'>To: ".$row['name']."</p><br><hr><br><textarea readonly class='message'>".$row['message']."</textarea>
                        <a class='btn-del' href='delete-message.php?id=".$row['id']."'>Delete</a><div class='tnd'><em>".$row['time']."</em>-<em>".$row['date']."</em></div></div>";
                    } 
                }
            }
        ?>
        </div>
    
    <?php else: ?>  
        <div class="no-account-selected">
            <h1>No account selected</h1>
            <p class="Login"><a href="#">Login</a>
        </div>
    <?php endif; ?> 
</body>
</html>