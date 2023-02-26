<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "brgy_db";

// Creates Connection
$connection = new mysqli($servername, $username, $password, $database);


$id = "";
$position = "";
$name = "";
$contact = "";
$address = "";
$date_employment = "";

$errorMessage = "";
$successMessage = "";

if ( $_SERVER['REQUEST_METHOD'] == 'GET') {
    //GET method: Show the data of the Barangay Officials

    if ( !isset($_GET["id"])) {
        header("location: /brgy/brgyofficials.php");
        exit;
    }

    $id = $_GET["id"];

    //Read the row of the selected barangay officials from database table
    $sql = "SELECT * FROM brgyofficials WHERE id=$id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: /brgy/brgyofficials.php");
        exit;
    }

    $position = $row["position"];
    $name = $row["name"];
    $contact = $row["contact"];
    $address = $row["address"];
    $date_employment = $row["date_employment"];

}
else {
    //POST method: Update the data of the barangay officials

    $id = $_POST["id"];
    $position = $_POST["position"];
    $name = $_POST["name"];
    $contact = $_POST["contact"];
    $address = $_POST["address"];
    $date_employment = $_POST["date_employment"];

    do {
        if (empty($id) || empty($position) || empty($name) || empty($contact) || empty($address) || empty($date_employment) ) {
            $errorMessage = "All the fields are required";
            break;
        }

        $sql = "UPDATE brgyofficials " .
                "SET position = '$position', name = '$name', contact = '$contact', address = '$address', date_employment = '$date_employment' " .
                "WHERE id = $id";

        $result = $connection->query($sql);
        
        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $successMessage = "Barangay Official updated successfully!";

        header("location: /brgy/brgyofficials.php");
        exit;
    } while (false);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon" href = "./img/brgylogo.png">
    <title>Barangay 35 | Edit Brgy Official</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Edit Barangay Official Record</h2>

        <?php
        if ( !empty($errorMessage)) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errorMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>

        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class ="col-sm-3 col-form-label">Position</label>
                <div class = "col-sm-6">
                    <input type="text" class= "form-control" name="position" value="<?php echo $position; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class ="col-sm-3 col-form-label">Name</label>
                <div class = "col-sm-6">
                    <input type="text" class= "form-control" name="name" value="<?php echo $name; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class ="col-sm-3 col-form-label">Contact</label>
                <div class = "col-sm-6">
                    <input type="text" class= "form-control" name="contact" value="<?php echo $contact; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class ="col-sm-3 col-form-label">Address</label>
                <div class = "col-sm-6">
                    <input type="text" class= "form-control" name="address" value="<?php echo $address; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class ="col-sm-3 col-form-label">Date Employment</label>
                <div class = "col-sm-6">
                    <input type="text" class= "form-control" name="date_employment" value="<?php echo $date_employment; ?>">
                </div>
            </div>


            <?php
            if ( !empty($successMessage) ) {
                echo "
                <div class = 'row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-sucess alert-dismissable fade show' role='alert'>
                        <strong>$successMessage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label></button>
                        </div>
                    </div>
                </div>   
                ";
            }
            ?>
            <div class="row mb-3">
                <div class = "offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/brgy/brgyofficials.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>