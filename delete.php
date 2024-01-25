<?php
include './database.php';

$id = $_GET['id'];
$sql = "DELETE FROM `clients` WHERE id=$id";
$result = mysqli_query($conn, $sql);

if ($result) {
    header('Location: index.php?msg=Record Deleted Successfully');
} else {

    echo 'Error: ' . mysqli_error($conn);
}
