<?php
session_start();


$cookie_user = isset($_COOKIE['remembered_user']) ? $_COOKIE['remembered_user'] : "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $_SESSION['user'] = $username;

    
    if (isset($_POST['remember'])) {
        setcookie("remembered_user", $username, time() + (86400 * 7), "/");
    } else {
        setcookie("remembered_user", "", time() - 3600, "/");
    }

    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Final Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f0f2f5; height: 100vh; display: flex; align-items: center; }
        .login-card { max-width: 400px; border: none; border-radius: 8px; }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-lg login-card p-4 mx-auto">
                <div class="text-center mb-4">
                    <h2 class="fw-bold text-primary">Login</h2>
                    <p class="text-muted">Access your project dashboard</p>
                </div>

                <form method="POST" action="">
                    <div class="form-floating mb-3">
                        <input type="text" name="username" class="form-control" id="userInput" placeholder="Username" value="<?php echo $cookie_user; ?>" required>
                        <label for="userInput">Username</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="passInput" placeholder="Password" required>
                        <label for="passInput">Password</label>
                    </div>

                    <div class="form-check mb-4">
                        <input type="checkbox" name="remember" class="form-check-input" id="rememberCheck" <?php if($cookie_user) echo "checked"; ?>>
                        <label class="form-check-label small" for="rememberCheck">Remember my username</label>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2 fw-bold mb-3">Login</button>
                    
                    <hr>

                    <div class="text-center pt-2">
                        <p class="small text-muted mb-2">New to the project?</p>
                        <a href="signup.php" class="btn btn-outline-success w-100 py-2 fw-bold">Create New Account</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
