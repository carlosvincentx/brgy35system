<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "brgy_db";

// Creates Connection
$connection = new mysqli($servername, $username, $password, $database);


$household_no = "";
$head_family = "";
$type_household = "";
$year_stay = "";
$street = "";

$errorMessage = "";
$successMessage = "";

if ( $_SERVER['REQUEST_METHOD'] == 'GET') {
    //GET method: Show the data of the household

    if ( !isset($_GET["household_no"])) {
        header("location: /brgy/rbi.php");
        exit;
    }

    $household_no = $_GET["household_no"];

    //Read the row of the selected household from database table
    $sql = "SELECT * FROM rbi WHERE household_no=$household_no";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: /brgy/rbi.php");
        exit;
    }

    $head_family = $row["head_family"];
    $type_household = $row["type_household"];
    $year_stay = $row["year_stay"];
    $street = $row["street"];

}
else {
    //POST method: Update the data of the household

    $household_no = $_POST["household_no"];
    $head_family = $_POST["head_family"];
    $type_household = $_POST["type_household"];
    $year_stay = $_POST["year_stay"];
    $street = $_POST["street"];

    do {
        if (empty($household_no) || empty($head_family) || empty($type_household) || empty($year_stay) || empty($street) ) {
            $errorMessage = "All the fields are required";
            break;
        }

        $sql = "UPDATE rbi " .
                "SET head_family = '$head_family', type_household = '$type_household', year_stay = '$year_stay', street = '$street' " .
                "WHERE household_no = $household_no";

        $result = $connection->query($sql);
        
        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $successMessage = "Household updated successfully!";

        header("location: /brgy/rbi.php");
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
    <title>Barangay 35 | Edit Household</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Edit Household</h2>

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
            <input type="hidden" name="household_no" value="<?php echo $household_no; ?>">
            <div class="row mb-3">
                <label class ="col-sm-3 col-form-label">Head of the Family</label>
                <div class = "col-sm-6">
                    <input type="text" class= "form-control" name="head_family" value="<?php echo $head_family; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class ="col-sm-3 col-form-label">Type of Household</label>
                <div class = "col-sm-6">
                    <input type="text" class= "form-control" name="type_household" value="<?php echo $type_household; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class ="col-sm-3 col-form-label">Year of Stay</label>
                <div class = "col-sm-6">
                    <input type="text" class= "form-control" name="year_stay" value="<?php echo $year_stay; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class ="col-sm-3 col-form-label">Street</label>
                <div class = "col-sm-6">
                    <input type="text" class= "form-control" name="street" value="<?php echo $street; ?>">
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
                    <a class="btn btn-outline-primary" href="/brgy/rbi.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>