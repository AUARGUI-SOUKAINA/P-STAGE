<!DOCTYPE html>
<html>
<head>
    <title>Login Credentials</title>
</head>
<body>
    <h1>Welcome,{{ $student->name }}!</h1>
    <p>Group: {{ $student->group->name }}</p>
    <p>Your login credentials:</p>
    <p>Email: {{ $student->email }}</p>
    <p>Password: {{ $password }}</p>
    <p>Please keep your login credentials secure and do not share them with anyone.</p>
    <p>Thank you!</p>
</body>
</html>
