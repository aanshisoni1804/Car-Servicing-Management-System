<?php
error_reporting(E_ALL);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bootstrap";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch total cars in the garage
$sql_total_cars = "SELECT COUNT(*) as total_cars FROM entry_form WHERE car_status = 'UNREPAIRED'";
$result_total_cars = $conn->query($sql_total_cars);
$total_cars = $result_total_cars->fetch_assoc()['total_cars'];

// Fetch total cars exited
$sql_total_exited = "SELECT COUNT(*) as total_exited FROM entry_form WHERE exit_date IS NOT NULL";
$result_total_exited = $conn->query($sql_total_exited);
$total_exited = $result_total_exited->fetch_assoc()['total_exited'];

// Fetch number of cars repaired
$sql_repaired = "SELECT COUNT(*) as repaired FROM entry_form WHERE car_status = 'REPAIRED'";
$result_repaired = $conn->query($sql_repaired);
$repaired = $result_repaired->fetch_assoc()['repaired'];

// Fetch number of cars exited without repair
$sql_unrepaired_exit = "SELECT COUNT(*) as unrepaired_exit FROM entry_form WHERE car_status = 'UNREPAIRED' AND exit_date IS NOT NULL";
$result_unrepaired_exit = $conn->query($sql_unrepaired_exit);
$unrepaired_exit = $result_unrepaired_exit->fetch_assoc()['unrepaired_exit'];

$conn->close();
?>

<?php 
include("header.php"); 
?>

<div class="container py-5">
    <h2 class="text-center">Car Service Status</h2>
    <div class="row">
        <div class="col-md-6">
            <h3>Total Cars in Garage</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Total Cars</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $total_cars; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <h3>Total Cars Exited</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Total Exited</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $total_exited; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h3>Number of Cars Repaired</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Repaired Cars</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $repaired; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <h3>Number of Cars Exited Without Repair</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Unrepaired Exited Cars</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $unrepaired_exit; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php 
include("footer.php"); 
?>
