<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saved Names</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Names in Database</h1>
    <ul>
        <?php
        // Database connection details (same as in process.php)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "my_php_db";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to select all names
        $sql = "SELECT name FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<li>" . htmlspecialchars($row["name"]) . "</li>";
            }
        } else {
            echo "<li>No names saved yet.</li>";
        }

        $conn->close(); // Close the database connection
        ?>
    </ul>
    <p><a href="index.html">Go Back to Form</a></p>
</body>
</html>