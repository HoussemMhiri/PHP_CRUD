<?php include './database.php'   ?>
<?php

//

$sql = "SELECT * FROM clients";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Invalid query:" . $conn->error);
}

$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyShop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <h2>List of Clients</h2>
        <a href="/create.php" class="btn btn-primary" role="button">New Client</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Adress</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as  $item) : ?>
                    <tr>
                        <td><?php echo $item['id'] ?></td>
                        <td><?php echo $item['name'] ?></td>
                        <td><?php echo $item['email'] ?></td>
                        <td><?php echo $item['phone'] ?></td>
                        <td><?php echo $item['address'] ?></td>
                        <td><?php echo $item['created_at'] ?></td>
                        <td>
                            <a href='/edit.php?id=<?php echo $item['id'] ?>' class="btn btn-primary btn-sm">Edit</a>
                            <a href="/delete.php?id=<?php echo $item['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>

                <?php endforeach;     ?>
            </tbody>
        </table>
    </div>

</body>

</html>