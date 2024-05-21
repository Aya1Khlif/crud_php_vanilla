<?php
$servername="localhost";
$username = 'root';
$password = '';
$database = 'myshop';
//create connection
$connection = new mysqli($servername, $username, $password, $database);


$name = "";
$email = "";
$phone = "";
$address = "";
$erorrMessage ="";
$successMessage ="";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    do {
        if (empty($name) || empty($email) || empty($phone) || empty($address)) {
            $erorrMessage = "ALL THE FIELD ARE REQUIRED";
            break;
        }
        //add new client to database
        $sql = "INSERT INTO clinets (name,email,phone,address)" 
        . "VALUES ('$name'  , '$email'  , 'phone' , '$address')";
          $result= $connection->query($sql);
             if(!$result){
            $erorrMessage="ERROR: " .  $connection->error;
            break;
             }   
        $name = "";
        $email = "";
        $phone = "";
        $address = "";
        $successMessage ="Clients added correctly";
        header("Location:/vica/index.php");
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
        if(!empty($erorrMessage)){
            echo"
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
            if(!empty($successMessage)){
                echo"
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script></body>
</body>

</html>