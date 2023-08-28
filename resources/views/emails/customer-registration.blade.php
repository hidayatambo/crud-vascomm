<!DOCTYPE html>
<html>
<head>
    <title>Customer Registration</title>
</head>
<body>
    <h2>Welcome to our platform, {{ $customer->name }}!</h2>
    <p>Your registration is successful. Here is your temporary password: {{ $password }}</p>
    <p>Please use this password to log in and change it once you're logged in.</p>
</body>
</html>
