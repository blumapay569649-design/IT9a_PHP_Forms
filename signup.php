<?php
session_start();
include 'header.php';
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = trim($_POST['username']);
    $email = trim($_POST['email']);
    $pass = $_POST['password'];

    
    if (empty($user) || empty($email) || empty($pass)) $errors[] = "All fields are required.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Please enter a valid email.";
    if (strlen($pass) < 8) $errors[] = "Password must be at least 8 characters.";

    if (empty($errors)) {
        $_SESSION['temp_user'] = $user;
        header("Location: login.php?msg=registered");
        exit();
    }
}
?>

<div class="container d-flex justify-content-center">
    <div class="card shadow form-container p-4 w-100">
        <h3 class="text-center mb-4">Create Account</h3>
        
        <?php foreach($errors as $err): ?>
            <div class="alert alert-danger py-2"><?php echo $err; ?></div>
        <?php endforeach; ?>

        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Sign Up</button>
            <p class="text-center mt-3">Already have an account? <a href="login.php">Login</a></p>
        </form>
    </div>
</div>

</body></html>
