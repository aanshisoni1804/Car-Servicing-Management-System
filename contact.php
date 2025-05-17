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
    // Validate required fields for entry and exit form
    if (isset($_POST['car-id'], $_POST['car-no'], $_POST['owner-name'], $_POST['entry-date'], $_POST['entry-time'], $_POST['rc'], $_POST['insurance'])) {
        $car_id = $_POST['car-id'];
        $car_no = $_POST['car-no'];
        $owner_name = $_POST['owner-name'];
        $entry_date = $_POST['entry-date'];
        $entry_time = $_POST['entry-time'];
        $rc_available = $_POST['rc'];
        $insurance = $_POST['insurance'];
        $other_req = isset($_POST['other-req']) ? $_POST['other-req'] : '';

        $car_status = isset($_POST['status']) ? $_POST['status'] : '';
        $expenditure = isset($_POST['expenditure']) ? $_POST['expenditure'] : '';
        $exit_date = isset($_POST['exit-date']) ? $_POST['exit-date'] : '';
        $exit_time = isset($_POST['exit-time']) ? $_POST['exit-time'] : '';
        $amount= isset($_POST['amount']) ? $_POST['amount'] : '';
        $remarks = isset($_POST['remarks']) ? $_POST['remarks'] : '';

        $sql = "INSERT INTO entry_form ( car_no, owner_name, entry_date, entry_time, rc_available, insurance, other_req, car_status)
                VALUES ( '$car_no', '$owner_name', '$entry_date', '$entry_time', '$rc_available', '$insurance', '$other_req', 'UNREPAIRED')";

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
<br>



<div class="container py-5">

    <div class="row justify-content-center">
		<div class="col-md-3">	
		</div>
        
	<div class="col-md-6">
    <div >
    <button onclick="toggleForm()" class="btn btn btn-info">Click to fill form</button> 
    </div>
        
    <form action="contact.php" method="POST"  id="car-entry-form" style="display:block">
    <h2 class="text-center">Car Entry Form</h2>
        <div class="form-group">
            <label for="car-id">Car ID:</label>
            <input class="form-control" type="text" id="car-id" name="car-id" placeholder="Enter your car-id">
        </div>
        <div class="form-group">
            <label for="car-no">Car Number:</label>
            <input type="text" class="form-control" id="car-no" name="car-no" placeholder="Enter your car-no">
        </div>

        <div class="form-group">
            <label for="owner-name">Owner Name:</label>
            <input type="text" class="form-control" id="owner-name" name="owner-name" placeholder="Enter your name">
        </div>

        <div class="form-group">
            <label for="entry-date">Entry Date:</label>
            <input type="date" class="form-control" id="entry-date" name="entry-date">
        </div>
        <div class="form-group">
            <label for="entry-time">Entry Time:</label>
            <input type="time" class="form-control" id="entry-time" name="entry-time">
        </div>

        <div class="form-group">
            <label>RC Available:</label><br>
            <input type="radio" id="rc-yes" name="rc" value="yes">
            <label for="rc-yes">Yes</label><br>
            <input type="radio" id="rc-no" name="rc" value="no">
            <label for="rc-no">No</label><br>
        </div>

        <div class="form-group">
            <label>Insurance:</label><br>
            <input type="radio" id="insurance-yes" name="insurance" value="yes">
            <label for="insurance-yes">Yes</label><br>
            <input type="radio" id="insurance-no" name="insurance" value="no">
            <label for="insurance-no">No</label><br>
        </div>

        <div class="form-group">
            <label for="other-req">Other Requirements:</label>
            <input type="text" class="form-control" id="other-req" name="other-req" placeholder="Enter if any other requirements" maxlength="200">
        </div>

        <br>
        <input type="submit" class="btn btn-primary" name="service" value="Submit Form" onsubmit=" return abc()">
    </form>  
	
	<form id="car-exit-form" style="display:none;">
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
    function validateEntryForm() {

    var carId = document.getElementById('car-id').value;
    var carNo = document.getElementById('car-no').value;
    var ownerName = document.getElementById('owner-name').value;
    var entryDate = document.getElementById('entry-date').value;
    var entryTime = document.getElementById('entry-time').value;
    var rcYes = document.getElementById('rc-yes').checked;
    var rcNo = document.getElementById('rc-no').checked;
    var insuranceYes = document.getElementById('insurance-yes').checked;
    var insuranceNo = document.getElementById('insurance-no').checked;

    if (!carId || !carNo || !ownerName || !entryDate || !entryTime || (!rcYes && !rcNo) || (!insuranceYes && !insuranceNo)) {
        alert("Please fill out all required fields.");
        return false;
    }

    return true;
}

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

 function toggleForm() {
        
        var entryform = document.getElementById("car-entry-form"); 
        var exitform = document.getElementById("car-exit-form"); 
		
        if (entryform.style.display == "none" ) {
            
            entryform.style.display = "block";
			exitform.style.display = "none";
            resetForm(entryform);
        } else {
            
			exitform.style.display = "block";
            entryform.style.display = "none";
            resetForm(exitform);
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
include("footer.php");
?>