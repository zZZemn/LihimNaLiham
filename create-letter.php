<?php 
 include("database.php");
include("time&date.php");

 if(isset($_POST['post']))
 {
    $postTime = $time;
    $postDate = $date;

    $to = $_POST['to'];
    $message = $_POST['message'];

    $posting = "INSERT INTO message(`name`, `message`, `time`, `date`) VALUES ('$to','$message', '$postTime', '$postDate')";

    if($connect->query($posting) == true)
    {
        header("location: letters.php");
    }
    else
    {
        echo '<script type="text/javascript">alert("Invalid Input!");</script>';     
    }
 }
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
    <form action="" method="post" class="hidden">
        <div class="first-row transition">
            <input type="text" name="to" id="to" maxlength="20" placeholder="To:" required>
            <a class="letters" href="letters.php">View letters</a>
            <a class="close" href="index.html"><ion-icon name="close"></ion-icon></a>
        </div>
        <br>
        <textarea class="transition" name="message" id="message" placeholder="Write your message here." required></textarea>
        <br>
        <input type="submit" value="Post" name="post" id="post">
        <br>
    </form>

    <script src="js/app.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>
</html>