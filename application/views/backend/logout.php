<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>LOGIN</h2>

<form action="<?= base_url('auth/do_login') ?>" method="POST">
    <input type="text" name="username" placeholder="Username" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit">Login</button>
</form>

</body>
</html>
