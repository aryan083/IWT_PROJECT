if(isset($_GET['logout'])) {
    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Clear any existing cookies
    setcookie('studentEmail', '', time() - 3600, '/');
    setcookie('facultyEmail', '', time() - 3600, '/');
    setcookie('parentEmail', '', time() - 3600, '/');

    // Redirect to the login page
    header("Location: login-page.html");
    exit();
}