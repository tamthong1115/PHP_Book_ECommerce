<?php
include '../layout/header.php';
?>
<link rel="stylesheet" href="../../public/css/pages/auth.css">
<div class="auth-container">
    <form action="/path/to/authentication/script.php" method="POST">
        <h2>Sign In</h2>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Sign In</button>
        <p>Don't have an account? <a href="/template/auth/sign_up.php">Sign up here</a></p>
    </form>
</div>
<?php
include '../layout/footer.php';
?>
