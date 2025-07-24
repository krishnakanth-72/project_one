<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello from PHP!</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>
        <?php
        // --- DATABASE CONNECTION ---
        $servername = "localhost"; // Usually 'localhost' for XAMPP
        $username = "root";        // Default XAMPP username
        $password = "";            // Default XAMPP password (empty)
        $dbname = "my_php_db";     // The database name you created

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // --- END DATABASE CONNECTION ---


        if (isset($_POST['userName']) && !empty($_POST['userName'])) {
            $name = htmlspecialchars($_POST['userName']);

            // --- INSERT DATA INTO DATABASE ---
            $sql = "INSERT INTO users (name) VALUES ('$name')"; // SQL query to insert name

            if ($conn->query($sql) === TRUE) {
                echo "Hello, " . $name . "! Your name has been saved to the database.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            // --- END INSERT DATA ---

        } else {
            echo "Please go back and enter your name.";
        }

        $conn->close(); // Close the database connection
        ?>
    </h1>
    <p><a href="index.html">Go Back</a></p>
</body>
</html>