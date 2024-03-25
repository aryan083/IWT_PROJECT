<?php

require_once 'dbconnection.php';

function redirectWithError($error) {
    header('Location: add_project.html?error=' . $error);
    exit();
}

function insertIntoProject($conn, $project_title, $project_description) 
{
    $sql = "INSERT INTO project (project_title, project_description) VALUES ('$project_title', '$project_description')";
    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
        exit();
    }
    return $conn->insert_id;
}

function insertIntoProjectContributors($conn, $collaborator_name, $collaborator_role, $project_id) 
{
    for($i = 0; $i < count($collaborator_name); $i++) 
    {
        $sql = "INSERT INTO spms_project_contributors (collaborator_name, collaborator_role, project_id) VALUES ('$collaborator_name[$i]', '$collaborator_role[$i]', '$project_id')";
        $conn->query($sql);
    }
}

function insertIntoProjectFaculty($conn, $mentor_name, $project_id) 
{
    for($i = 0; $i < count($mentor_name); $i++) 
    {
        $sql = "INSERT INTO spms_project_faculty (mentor_name, project_id) VALUES ('$mentor_name[$i]', '$project_id')";
        $conn->query($sql);
    }
}

function insertIntoProjectMediaFiles($conn, $media_files, $project_id) 
{
    for($i = 0; $i < count($media_files); $i++) 
    {
        $sql = "INSERT INTO spms_project_media_files (media_files, project_id) VALUES ('$media_files[$i]', '$project_id')";
        $conn->query($sql);
    }
}

function insertIntoProjectCoverImage($conn, $cover_image, $project_id) {
    $sql = "INSERT INTO spms_project (cover_image, project_id) VALUES ('$cover_image', '$project_id')";
    $conn->query($sql);
}

function insertIntoProjectStartDate($conn, $start_date, $project_id) {
    $sql = "INSERT INTO spms_project (start_date, project_id) VALUES ('$start_date', '$project_id')";
    $conn->query($sql);
}

function insertIntoProjectEndDate($conn, $end_date, $project_id) {
    $sql = "INSERT INTO spms_project (end_date, project_id) VALUES ('$end_date', '$project_id')";
    $conn->query($sql);
}

function insertIntoProjectStatus($conn, $project_status, $project_id) {
    $sql = "INSERT INTO spms_project (project_status, project_id) VALUES ('$project_status', '$project_id')";
    $conn->query($sql);
}

function insertIntoProjectInstructions($conn, $instructions, $project_id) {
    $sql = "INSERT INTO spms_project (instructions, project_id) VALUES ('$instructions', '$project_id')";
    $conn->query($sql);
}

function insertIntoProjectOutcomes($conn, $outcomes, $project_id) {
    $sql = "INSERT INTO spms_project (outcomes, project_id) VALUES ('$outcomes', '$project_id')";
    $conn->query($sql);
}

function insertIntoProjectRecognitions($conn, $recognitions, $project_id) {
    $sql = "INSERT INTO spms_project (recognitions, project_id) VALUES ('$recognitions', '$project_id')";
    $conn->query($sql);
}

function insertIntoProjectLinks($conn, $links, $project_id) {
    $sql = "INSERT INTO spms_project_links (links, project_id) VALUES ('$links', '$project_id')";
    $conn->query($sql);
}

// Now we can use these functions in our main code

if(!isset($_POST['Project Title']) || !isset($_POST['Project Description'])) {
    redirectWithError('Please fill project title and description !');
}

$project_title = $_POST['Project Title'];
$project_description = $_POST['Project Description'];
$project_id = insertIntoProject($conn, $project_title, $project_description);

if(isset($_POST['CollaboratorName[]']) && isset($_POST['CollaboratorRole[]'])) {
    $collaborator_name = $_POST['CollaboratorName[]'];
    $collaborator_role = $_POST['CollaboratorRole[]'];
    insertIntoProjectContributors($conn, $collaborator_name, $collaborator_role, $project_id);
} else {
    redirectWithError('Please fill collaborator names and roles !');
}

if(isset($_POST['MentorName[]'])) {
    $mentor_name = $_POST['MentorName[]'];
    insertIntoProjectFaculty($conn, $mentor_name, $project_id);
} else {
    redirectWithError('Please fill mentor names !');
}

if(isset($_POST['MediaFiles[]'])) {
    $media_files = $_POST['MediaFiles[]'];
    insertIntoProjectMediaFiles($conn, $media_files, $project_id);
} else {
    redirectWithError('Please fill media files !');
}

if(isset($_POST['CoverIamge'])) {
    $cover_image = $_POST['CoverIamge'];
    insertIntoProjectCoverImage($conn, $cover_image, $project_id);
} else {
    redirectWithError('Please fill cover image !');
}

if(isset($_POST['StartDate'])) {
    $start_date = $_POST['StartDate'];
    insertIntoProjectStartDate($conn, $start_date, $project_id);
} else {
    redirectWithError('Please fill start date !');
}

if(isset($_POST['EndDate'])) {
    $end_date = !empty($_POST['EndDate']) ? $_POST['EndDate'] : null;
    insertIntoProjectEndDate($conn, $end_date, $project_id);
}

if(isset($_POST['ProjectStatus'])) {
    $project_status = $_POST['ProjectStatus'];
    insertIntoProjectStatus($conn, $project_status, $project_id);
} else {
    redirectWithError('Please fill project status !');
}

if(isset($_POST['Instructions'])) {
    $instructions = $_POST['Instructions'];
    insertIntoProjectInstructions($conn, $instructions, $project_id);
} else {
    redirectWithError('Please fill instructions !');
}

if(isset($_POST['Outcomes'])) {
    $outcomes = $_POST['Outcomes'];
    insertIntoProjectOutcomes($conn, $outcomes, $project_id);
} else {
    redirectWithError('Please fill outcomes !');
}

if(isset($_POST['Recognitions'])) {
    $recognitions = $_POST['Recognitions'];
    insertIntoProjectRecognitions($conn, $recognitions, $project_id);
} else {
    redirectWithError('Please fill recognitions !');
}

if(isset($_POST['Links'])) {
    $links = $_POST['Links'];
    insertIntoProjectLinks($conn, $links, $project_id);
} else {
    redirectWithError('Please fill links !');
}

echo "New record created successfully";
