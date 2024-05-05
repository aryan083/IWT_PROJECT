<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="front-end/add-project-files/add-project-styles.css">
</head>
<body style="background-color: #6da9e9;">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <?php
            // Assuming $project is an associative array containing project details
            $project = array(
                'title' => $project['title'],
                'description' => $project['description'],
                'start_date' => $project['start_date'],
                'end_date' => $project['end_date'],
                'status' => $project['status']
                // Assuming you have arrays for images, videos, and documents
            );
            
            // Echo project title
            echo '<div class="row border rounded-3 p-3 bg-white shadow box-area mb-44 mt-4" style="margin:10px">';
            echo '<div class="form-control form-control-lg bg-white" style="text-align: center; border: none; margin:10px">';
            echo '<h1><b style="font-weight: 650;">' . $project['title'] . '</b></h1>';
            echo '</div>';
            echo '</div>';
            
            // Echo project description
            echo '<div class="row border rounded-3 p-3 bg-white shadow box-area mb-44 mt-4" style="margin:10px">';
            echo '<h2><b style="font-weight: 550;text-decoration: underline;">Description</b></h2>';
            echo '<h5>' . $project['description'] . '</h5>';
            echo '</div>';
            
            // Echo start date
            echo '<div class="row border rounded-3 p-3 bg-white shadow box-area mb-44 mt-4" style="margin:10px">';
            echo '<h2><b style="font-weight: 550;text-decoration: underline; display: inline;">Start Date</b></h2>';
            echo '<h5 style="display: inline;">' . $project['start_date'] . '</h5>';
            echo '</div>';
            
            // Echo end date
            echo '<div class="row border rounded-3 p-3 bg-white shadow box-area mb-44 mt-4" style="margin:10px">';
            echo '<h2><b style="font-weight: 550;text-decoration: underline; display: inline;">End Date</b></h2>';
            echo '<h5 style="display: inline;">' . $project['end_date'] . '</h5>';
            echo '</div>';
            
            // Echo status
            echo '<div class="row border rounded-3 p-3 bg-white shadow box-area mb-44 mt-4" style="margin:10px">';
            echo '<h2><b style="font-weight: 550;text-decoration: underline; display: inline;">Status</b></h2>';
            echo '<h5 style="display: inline;">' . $project['status'] . '</h5>';
            echo '</div>';
            
            // // Echo images
            // echo '<div class="row border rounded-3 p-3 bg-white shadow box-area mb-44 mt-4" style="margin:10px">';
            // echo '<h2><b style="font-weight: 550;text-decoration: underline; display: inline;">Photos</b></h2>';
            // echo '<h5 style="display: inline;">'; // Assuming you have an array of images
            // foreach ($images as $image) {
            //     echo '<img src="' . $image . '" alt="Image">';
            // }
            // echo '</h5>';
            // echo '</div>';
            
            // // Echo videos
            // echo '<div class="row border rounded-3 p-3 bg-white shadow box-area mb-44 mt-4" style="margin:10px">';
            // echo '<h2><b style="font-weight: 550;text-decoration: underline; display: inline;">Videos</b></h2>';
            // echo '<h5 style="display: inline;">'; // Assuming you have an array of videos
            // foreach ($videos as $video) {
            //     echo '<video src="' . $video . '" controls></video>';
            // }
            // echo '</h5>';
            // echo '</div>';
            
            // // Echo documents
            // echo '<div class="row border rounded-3 p-3 bg-white shadow box-area mb-44 mt-4" style="margin:10px">';
            // echo '<h2><b style="font-weight: 550;text-decoration: underline; display: inline;">Documents</b></h2>';
            // echo '<h5 style="display: inline;">'; // Assuming you have an array of documents
            // foreach ($documents as $document) {
            //     echo '<a href="' . $document . '" target="_blank">Document</a>';
            // }
            // echo '</h5>';
            // echo '</div>';
        ?>
    </div>
    <script type="text/javascript" src="front-end/add-project-files/add-project-script.js"></script>
</body>
</html>
