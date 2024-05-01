<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Library</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="container">
        <h1>Project Library</h1>
        <div class="projects">
            <?php include 'fetch_projects.php'; ?> <!-- Include PHP script to fetch projects -->
            
        </div>
    </div>
</body>
</html>
