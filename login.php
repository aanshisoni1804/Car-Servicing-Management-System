<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bootstrap";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate required fields
    if (isset($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['add'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $address = $_POST['add'];

        $sql = "INSERT INTO login_form (First_Name, Last_Name, Email_Id, Address)
                VALUES ('$fname', '$lname', '$email', '$address')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Please fill out all required fields.";
    }
}

$conn->close();
?>

<?php
include("header.php");
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form action="login.php" method="POST" id="myform" style="display:block" onsubmit="return validateForm()">
                <h2 class="text-center">Login Form</h2>
                <div class="form-group">
                    <label for="fname">First Name:</label><br>
                    <input class="form-control form-control-login" placeholder="Enter your first name" type="text" id="fname" name="fname" maxlength="10"><br>
                </div>
                <div class="form-group">
                    <label for="lname">Last Name:</label><br>
                    <input class="form-control" placeholder="Enter your last name" type="text" id="lname" name="lname" maxlength="10"><br>
                </div>
                <div class="form-group">
                    <label for="email">Email Id:</label><br>
                    <input class="form-control" placeholder="Enter your email id" type="text" id="email" name="email"><br>
                </div>
                <div class="form-group">
                    <label for="add">Address:</label><br>
                    <input class="form-control" placeholder="Enter your address" type="text" id="add" name="add">
                </div>
                <br>
                <input type="submit" class="btn btn-primary" name="newGuest" value="Submit Form">
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<div style="margin-top:2em;"></div>

<script>
    function validateForm() {
        var fname = document.getElementById("fname").value;
        var lname = document.getElementById("lname").value;
        var email = document.getElementById("email").value;
        var add = document.getElementById("add").value;

        if (fname === "" || lname === "" || email === "" || add === "") {
            alert("Please fill out all required fields.");
            return false;
        }

        if (fname.length > 10 || lname.length > 10) {
            alert("First Name and Last Name must be less than or equal to 10 characters");
            return false;
        }

        if (!email.includes('@')) {
            alert("Email must contain '@'");
            return false;
        }
        return true;
    }
</script>

<?php
include("footer.php");
?>
