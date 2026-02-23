<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
include 'header.php';
?>

<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
        <span class="navbar-brand mb-0 h1">Project Dashboard</span>
        <a href="logout.php" class="btn btn-outline-light btn-sm">Logout</a>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card p-3 mb-3">
                <h5>User Profile</h5>
                <p class="text-muted">Logged in as: <strong><?php echo $_SESSION['user']; ?></strong></p>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card p-4">
                <h2>Welcome to your Project System</h2>
                <p>This dashboard is connected to your final project. You can now manage your data here.</p>
                <hr>
                <div class="alert alert-info">
                    <strong>Note:</strong> Sessions are currently keeping you authenticated.
                </div>
            </div>
        </div>
    </div>
</div>
</body></html>