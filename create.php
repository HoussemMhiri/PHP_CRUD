<?php include './database.php'   ?>

<?php

$name = $email = $phone = $address =  "";
$nameErr = $emailErr = $phoneErr = $addressErr = "";

// Form submit
if (isset($_POST["submit"])) {
    // Validate name 
    if (empty($_POST['name'])) {
        $nameErr = 'Name is Required';
    } else {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    };
    // Validate Email
    if (empty($_POST['email'])) {
        $emailErr = 'Email is Required';
    } else {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    };
    // Validate body 
    if (empty($_POST['phone'])) {
        $phoneErr = 'Phone is Required';
    } else {
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    };
    // Validate body 
    if (empty($_POST['address'])) {
        $addressErr = 'address is Required';
    } else {
        $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    };

    if (empty($nameErr) && empty($emailErr) && empty($phoneErr) && empty($addressErr)) {
        // Add to database 
        $sql = "INSERT INTO clients (name, email ,phone,address) VALUES ('$name','$email','$phone','$address')";
        if (mysqli_query($conn, $sql)) {
            // Success
            header('Location: index.php');
        } else {
            // ERROR 
            echo 'Error' . mysqli_error($conn);
        }
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
                    <input type="text" class="form-control" name="name" id="">
                </div>
                <div class="invalid-feedback"><?php echo $nameErr ?></div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" id="">
                </div>
                <div class="invalid-feedback"><?php echo $emailErr ?></div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Phone</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone" id="">
                </div>
                <div class="invalid-feedback"><?php echo $phoneErr ?></div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" id="">
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