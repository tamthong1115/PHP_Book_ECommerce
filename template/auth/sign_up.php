<?php
include '../layout/header.php';
?>
<link rel="stylesheet" href="../../public/css/pages/auth.css">
<div class="auth-container">
    <form action="/path/to/registration/script.php" method="POST">
        <h2>Sign Up</h2>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="confirm-password">Confirm Password:</label>
            <input type="password" id="confirm-password" name="confirm-password" required>
        </div>
        <button type="submit">Sign Up</button>
        <p>Already have an account? <a href="/template/auth/sign_in.php">Sign in here</a></p>
    </form>
</div>
<?php
include '../layout/footer.php';
?>