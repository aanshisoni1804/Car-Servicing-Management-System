<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bootstrap";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT  s_no,car_no, owner_name, entry_date, exit_date FROM entry_form where car_status != 'repaired' ORDER BY entry_date ASC";

$result = $conn->query($sql);
?>

<?php 
include("header.php");
 ?>

<div class="container py-5">
    <h2 class="text-center">Car Service History</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>S. No.</th>
                <th>Car Number</th>
                <th>Owner Name</th>
                <th>Entry Date</th>
                <th>Exit Date</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                $count = 1;
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo   "<td>" . $count . "</td>
                            <td>" . $row["car_no"] . "</td>
                            <td>" . $row["owner_name"] . "</td>
                            <td>" . $row["entry_date"] . "</td><td>";
                        if($row["exit_date"] < 1 )
                            echo "Still in service ";
                        else
                            echo $row["exit_date"];
                      echo "</td>";
                     echo "<td>";
                     echo "<form method='POST' action='exitform.php'><input hidden type='text' name='id' value='".$row['s_no']."'><button type='submit' class='btn btn-primary'>Submit</button></form>";
                     echo "</td>";
                     echo "</tr>";
                          $count++;
                }
            } else {
                echo "<tr><td colspan='5' class='text-center'>No car history available</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php
$conn->close();
?>

<?php
 include("footer.php"); 
 ?>