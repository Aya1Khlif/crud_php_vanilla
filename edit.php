<?php
$servername = "localhost";
$username = 'root';
$password = '';
$database = 'myshop';
//create connection
$connection = new mysqli($servername, $username, $password, $database);



$id = "";
$name = "";
$email = "";
$phone = "";
$address = "";

$erorrMessage = "";
$successMessage = "";
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["id"])) {
        header("Location: /vica/index.php");
        exit;
    }
    $id = $_GET["id"];
    //read all row from database table
    $sql = "SELECT * FROM clinets WHERE id=$id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();
    if (!$row) {
        header("location: /vica/index.php");
        exit;
    }

    $name = $row["name"];
    $email = $row["email"];
    $phone = $row["phone"];
    $address = $row["address"];
} else {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    do {
        if (empty($name) || empty($email) || empty($phone) || empty($address)) {
            $erorrMessage = "ALL THE FIELD ARE REQUIRED";
            break;
        }
        $sql = "UPDATE clinets" . " SET  name = '$name' , email = '$email' , phone = '$phone' , address =$address" .
            "WHERW id = '$id";
            $result= $connection->query($sql);
            if(!$result){
                $erorrMessage="ERROR: " .  $connection->error;
                break;
                 }   
                 $successMessage =" Clinet successfully updated";
                 header("location: /vica/index.php");
                 exit;
    } while (false);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>myshop</title>
</head>

<body>
    <div class="container my-5">
        <h2>New Client</h2>
        <?php
        if (!empty($erorrMessage)) {
            echo "
            <div class='alert alert-warning alert-dimissible fade show'' rple='alert'>
            <strong>
            $erorrMessage
            </strong>
            <button type='button' class='btn-close' data-bs-dimiss='alert' aria-lable='Close'></button>
            </div>
            ";
        }
        ?>
        <form method="post">
            <input type="hidden" value="<?php echo $id ?>">
            <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-lable">Name</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="" class="form-control" value="<?php echo $name ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-lable">Email</label>
                <div class="col-sm-6">
                    <input type="text" name="email" id="" class="form-control" value="<?php echo $email ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-lable">Phone Number</label>
                <div class="col-sm-6">
                    <input type="text" name="phone" id="" class="form-control" value="<?php echo $phone ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-lable">Address</label>
                <div class="col-sm-6">
                    <input type="text" name="address" id="" class="form-control" value="<?php echo $address ?>">
                </div>
            </div>

            <?php
            if (!empty($successMessage)) {
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dimissible fade show' role='alert'>
                        <strong>$successMessage</strong>
                        <button type='button' class='btn-close' data-bs-dimiss='alert' aria-lable='Close'  >
                        
                        </button>
                        </div>
                    </div>

                </div>
                
                ";
            }
            ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>
                <div class=" col-sm-3 d-grid">
                    <a href="/vica/index.php" role="button" class="btn btn-outline-primary"> Cansel</a>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</body>

</html>