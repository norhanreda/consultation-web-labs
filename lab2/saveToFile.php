
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Average Calculator</title>
</head>
<body>
<?php
session_start();
 echo "Avgrage is:";
 echo  $_SESSION['Average'];
 echo"<br>"

?>


<h2>Save Average to File</h2>
<form action="saveToFile.php" method="post" onsubmit="return validateFileForm()">
    <label for="fileNameInput">Enter a file name:</label>
    <input type="text" id="fileNameInput" name="filename" >
    <br>
    <input type="submit" value="Save to File">
</form>




   
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filename = $_POST["filename"];
    $average = $_SESSION['Average'];

    if (empty($filename)) {
        echo "Please enter a file name.";
    } else {
      
        $filePath = $filename . ".txt";
        $file = fopen($filePath,"w");
        fwrite($file, $average);
        fclose($file);

        echo "Average saved to file: " . $filePath;
    }
}
?>



   
    <script>

        function validateFileForm() {
            var fileNameInput = document.getElementById("fileNameInput").value;
            if (fileNameInput.trim() === "") {
                alert("Please enter a file name before submitting.");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
