
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Average Calculator</title>
</head>
<body>
    
    <?php
     session_start(); // must be called before data is sent
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $digits = $_POST["digits"];

    if (empty($digits)) {
        echo "Please enter a string of digits.";
    } else {
        $digitsArray = str_split($digits);
        $sum = array_sum($digitsArray);
        $average = $sum / count($digitsArray);
       
        $_SESSION['Average'] =$average ;
        header("Location: saveToFile.php");
        exit();

        //echo "Average: " . $average;
    }
}
?>
<h1>Average Calculator</h1>

<form action="avg.php" method="post" onsubmit="return validateForm()">
    <label for="digitsInput">Enter a string of digits (e.g., 1234):</label>
    <input type="text" id="digitsInput" name="digits"  pattern="\d+" title="Please enter only digits">
    <br>
    <input type="submit" value="Calculate Average">
</form>
    
    <script>
        function validateForm() {
            var digitsInput = document.getElementById("digitsInput").value;
            if (digitsInput.trim() === "") {
                alert("Please enter a string of digits before submitting.");
                return false;
            }
            return true;
        }

      
    </script>
</body>
</html>
