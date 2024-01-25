<?php include './database.php'   ?>

<?php
$id = $_GET['id'];

$sql = "SELECT * FROM clients WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);



if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql = "UPDATE `clients` SET `name`='$name', `email`='$email', `phone`='$phone', `address`='$address' WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('Location: /index.php');
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container my-5">
        <h2>New Client</h2>
        <form action="" method="post">
            <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" id="" value="<?php echo $row['name'];  ?>">
                </div>
                <div class="invalid-feedback"><?php echo $nameErr ?></div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" id="" value="<?php echo $row['email'];  ?>">
                </div>
                <div class="invalid-feedback"><?php echo $emailErr ?></div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Phone</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone" id="" value="<?php echo $row['phone'];  ?>">
                </div>
                <div class="invalid-feedback"><?php echo $phoneErr ?></div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" id="" value="<?php echo $row['address'];  ?>">
                </div>
                <div class="invalid-feedback"><?php echo $addressErr ?></div>
            </div>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">

                    <input type="submit" name="submit" value="Send" class="btn btn-primary" />
                </div>
                <div class="col-sm-3 d-grid">
                    <a href="/index.php" class="btn btn-outline-primary" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>