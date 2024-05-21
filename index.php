<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>CRUD</title>

</head>

<body>
    <div class="container py-5 ">
        <div class="table">
            <h2>List Of Cliaents</h2>
            <a class="btn btn-success" href="/vica/create.php" role="button">CREATE</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">created_at</th>
                        <th scope="col">acc</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $servername = 'localhost';
                    $username = 'root';
                    $password = '';
                    $database = 'myshop';
                    //create connection
                    $connection = new mysqli($servername, $username, $password, $database);
                    //check connection
                    if ($connection->connect_error) {
                        die("Error connecting failed" . $connection->connect_error);
                    }
                    //read all row from database table
                    $sql = "SELECT * FROM clinets";
                    $result = $connection->query($sql);
                    if (!$result) {
                        die("Invalid query" . $connection->connect_error);
                    }
                    while ($row = $result->fetch_assoc()) {
                        echo
                        " <tr>
                    <th scope='row'>$row[id]</th>
                    <td>$row[name]</td>
                    <td>$row[email]</td>
                    <td>$row[phone]</td>
                    <td>$row[address]</td>
                    <td>$row[created_at]</td>
                    <td>
                    <a class='btn btn-primary btn-sm' href='/vica/edit.php?id=$row[id]'>edit</a>
                    <a class='btn btn-danger btn-sm' href='/vica/delete.php?id=$row[id]'>Delete</a>
                    </td>
                  </tr>
";
                    }
                    ?>
                </tbody>
            </table>

        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script></body>

</html>