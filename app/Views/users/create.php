<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create User</title>
    <link rel="stylesheet" href="/public/css/global/global.css">
</head>
<body>
    <h1>Create User</h1>
    <form action="/users/create" method="post">
        <div class="form-group">
            <label for="avatar">Avatar</label>
            <input type="text" id="avatar" name="avatar">
        </div>
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" id="first_name" name="first_name">
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="last_name">
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
        </div>
        <div class="form-group">
            <label for="birth_of_date">Birth Date</label>
            <input type="date" id="birth_of_date" name="birth_of_date">
        </div>
        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" id="phone_number" name="phone_number">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" id="address" name="address">
        </div>
        <button type="submit">Create User</button>
    </form>
</body>
</html>