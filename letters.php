<?php 
 include("database.php");

$liham = "SELECT * FROM message ORDER BY id DESC";
$liham_result = $connect->query($liham); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/letters.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Sacramento&display=swap" rel="stylesheet">
    <title>Letters</title>
</head>
<body>
    <nav class="hidden">
        <a class="nav-transition" href="index.html" class="home">Home</a>
        <h3 class="nav-transition">Lihim na Liham</h3>
        <a class="nav-transition" href="create-letter.php">Create a Letter</a>
    </nav>
    <div class="letter-container hidden">
    <?php 
        if($liham_result->num_rows > 0)
        {
           while($row = $liham_result->fetch_assoc())
           {
            echo "<div class='letters'><p class='name'>To: ".$row['name']."</p><br><hr><br><textarea readonly class='message'>".$row['message']."</textarea><div class='tnd'><em>".$row['time']."</em>-<em>".$row['date']."</em></div></div>";
           } 
        }
    ?>
    </div>
    <script src="js/app.js"></script>
</body>
</html>