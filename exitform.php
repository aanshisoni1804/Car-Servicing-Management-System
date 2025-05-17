<?php
include("header.php");
?>

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
$id ="";
// Check if form is submitted
    // Validate required fields for entry and exit form
    if (isset($_POST['id'])) {
        
            $id  = $_POST['id'];       
        $sql = "SELECT `s_no`, `car_no`, `owner_name`, `entry_date`, `entry_time`, `rc_available`, `insurance`, `other_req`, `car_status`, `expenditure`, `exit_date`, `exit_time`, `amount`, `remarks` 
                FROM `entry_form` WHERE s_no = '" . $id . "';";

        //if ($conn->query($sql) === TRUE) {
        //    echo "New record created successfully";
        //} else {
        //    echo "Error: " . $sql . "<br>" . $conn->error;
        //}


?>

<div class="container py-5">

    <div class="row justify-content-center">
		<div class="col-md-3">	
		</div>
        
	<div class="col-md-6">   
	<form id="car-exit-form">
        <input type='hidden' name='s_no' value='<?php echo $id; ?>'>
			<h2 class="text-center">Car Exit Form</h2>
        <div class="form-group">
            <label>Car Status:</label><br>
            <input type="radio" id="repaired" name="status" value="repaired">
            <label for="repaired">Repaired</label><br>
            <input type="radio" id="unrepaired" name="status" value="unrepaired">
            <label for="unrepaired">Unrepaired</label><br>
        </div>
        <div class="form-group">
            <label for="expenditure">Expenditure:</label>
            <input type="text" class="form-control" id="expenditure" placeholder="Enter amount" name="expenditure">
        </div>
        <div class="form-group">
            <label for="exit-date">Exit Date:</label>
            <input type="date" class="form-control" id="exit-date" name="exit-date">
        </div>
        <div class="form-group">
            <label for="exit-time">Exit Time:</label>
            <input type="time" class="form-control" id="exit-time" name="exit-time">
        </div>
        <div class="form-group">
            <label>Amount paid :</label><br>
            <input type="radio" id="cash" name="status" value="cash">
            <label for="cash">In Cash</label><br>
            <input type="radio" id="card" name="status" value="card">
            <label for="card">Card</label><br>
            <input type="radio" id="other" name="status" value="other">
            <label for="other">Other</label><br>
        </div>
        <div class="form-group">
            <label for="remarks">Remarks:</label>
            <input type="text" class="form-control" id="remarks" name="remarks" placeholder="Enter if any remarks" maxlength="200">
        </div>

        <br>
        <input type="button" class="btn btn-primary" name="service" value="Submit Form" onclick="abc()">

	</form>
        </div>
		<div class="col-md-3">	
		</div>
  </div>
</div>

<script>

function validateExitForm() {
    var repaired = document.getElementById('repaired').checked;
    var unrepaired = document.getElementById('unrepaired').checked;
    var expenditure = document.getElementById('expenditure').value;
    var exitDate = document.getElementById('exit-date').value;
    var exitTime = document.getElementById('exit-time').value;
    var cash = document.getElementById('cash').checked;
    var card = document.getElementById('card').checked;
    

    if ((!repaired && !unrepaired) || !expenditure || !exitDate || !exitTime || (!cash && !card)) {
        alert("Please fill out all required fields.");
        return false;
    }

    return true;
}

function abc() {
    
    var entryform = document.getElementById("car-entry-form");
    var exitform = document.getElementById("car-exit-form");

    if (entryform.style.display === "block") {
        if (validateEntryForm()) {
            alert("Entry form submitted successfully.");
            return true;
        }
        else {
                return false;
            }
        }
     else if (exitform.style.display === "block") {
        if (validateExitForm()) {
            alert("Exit form submitted successfully.");
            
        }
    }
}


   function resetForm(form) {
    
    var inputs = form.getElementsByTagName('input');
    for (var i = 0; i < inputs.length; i++) {
        switch (inputs[i].type) {
            case 'text':
            case 'number':
            case 'email':
            case 'date':
            case 'time':
            
                inputs[i].value = '';
                break;
            case 'radio':
                inputs[i].checked = false;
                break;
        }
    }
}


</script>

<?php
} else {
    echo "Something went wrong. Kindly retry.";
}

$conn->close();
?>

<?php
include("footer.php");
?>