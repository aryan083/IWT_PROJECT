<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Library</title>
    <link rel="stylesheet" href="styles.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="front-end/add-project-files/add-project-styles.css">
</head>
<body>
    <div class="container d -flex justify-content-center align-items-center min-vh-100">

        <div class="row border rounded-5 p-3 bg-white shadow box-area mb-44 mt-4"style="margin:10px">

            <div class="form-control form-control-lg bg-white "style="text-align: center; border: none; margin:10px">
                <h1><b style="font-weight: 650;">PROJECT LIBRARY</b></h1>
            </div>
        </div>


    
    




    <div style="text-align: center; border: none; margin:10px">
    <div class="projects">
            <?php include 'fetch_projects.php'; ?> 
            
        </div>

    </div>



    
    </div>
</body>
</html>
