<?php 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/create-letter.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Sacramento&display=swap" rel="stylesheet">
    <title>Create a Letter</title>
</head>
<body>
    <form action="" method="post">
        <div class="first-row">
            <input type="text" name="to" id="to" placeholder="To:">
            <a class="close" href="index.html"><img src="img/close.svg" alt="close"></a>
        </div>
        <br>
        <textarea name="message" id="message" placeholder="Write your message here."></textarea>
        <br>
        <input type="submit" value="Post" name="post" id="post">
        <br>
    </form>
</body>
</html>