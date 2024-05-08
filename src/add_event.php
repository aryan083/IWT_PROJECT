<?php
require_once 'dbconnection.php';    

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form data (e.g., check if name and description are not empty)
    if (empty($_POST["name"]) || empty($_POST["description"])) {
        echo "Event name and description are required";
    } else {
        // Escape user inputs for security
        $name = $conn->real_escape_string($_POST['name']);
        $description = $conn->real_escape_string($_POST['description']);
        
        // Prepare SQL insert statement
        $sql = "INSERT INTO events (name, description) VALUES ('$name', '$description')";

        // Execute SQL statement
        if ($conn->query($sql) === TRUE) {
            echo "Event added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close connection
$conn->close();
?>
