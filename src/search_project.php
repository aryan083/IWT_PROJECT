<?php
require_once 'dbconnection.php';

if (!empty($_GET['search'])) {
    $searchText = $_GET['search'];
    $sql = "SELECT * FROM spms_projects WHERE title LIKE '%$searchText%'";
    $result = $conn->query($sql);
    $projects = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $projects[] = $row;
        }
    }

    header('Content-Type: application/json');
    echo json_encode($projects);

    $conn->close();
} else {
    header('Content-Type: application/json');
    echo json_encode([]);
}
?>
