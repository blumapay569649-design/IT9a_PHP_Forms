<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

include 'header.php';
?>

<nav class="navbar navbar-dark bg-dark mb-4 shadow-sm">
    <div class="container">
        <span class="navbar-brand mb-0 h1 text-info">Project Dashboard</span>
        <a href="logout.php" class="btn btn-danger btn-sm px-4 fw-bold">Logout</a>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow-sm p-3 mb-3 border-0">
                <h5 class="border-bottom pb-2">User Profile</h5>
                <p class="text-muted mt-2">Logged in as: <span class="badge bg-primary"><?php echo $_SESSION['user']; ?></span></p>
                <p class="small text-muted">Session ID: <br><code class="text-break"><?php echo session_id(); ?></code></p>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card shadow-sm p-4 border-0">
                <h2 class="fw-bold">Welcome to your Project System</h2>
                <p class="lead">This dashboard is connected to your final project. You can now manage your data here.</p>
                <hr>
                
                <div class="alert alert-success d-flex align-items-center" role="alert">
                    <div>
                        <strong>Success!</strong> Your session is active and your authentication is secure.
                    </div>
                </div>

                <div class="mt-4 p-3 bg-light rounded border">
                    <h6 class="text-uppercase text-secondary fw-bold">System Superglobals (Proof of Implementation)</h6>
                    <table class="table table-sm table-bordered mt-2 bg-white">
                        <tr class="table-secondary">
                            <th>Type</th>
                            <th>Current Value</th>
                        </tr>
                        <tr>
                            <td><strong>$_SESSION['user']</strong></td>
                            <td><?php echo $_SESSION['user']; ?></td>
                        </tr>
                        <tr>
                            <td><strong>$_COOKIE['remembered_user']</strong></td>
                            <td><?php echo isset($_COOKIE['remembered_user']) ? $_COOKIE['remembered_user'] : '<span class="text-danger">Not Set</span>'; ?></td>
                        </tr>
                    </table>
                </div>
                </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
