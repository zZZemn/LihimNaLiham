<?php
    include "database.php";
    $id = $_GET['id'];

    $delete = "DELETE from message WHERE id = $id";
    $connect->query($delete);

    header("location:admin-letter.php");