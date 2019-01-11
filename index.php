<?php
    ob_start();
    
    
    $username = filter_input(INPUT_COOKIE, 'username');
    $password = filter_input(INPUT_COOKIE, 'password');

    if($username == null || $password == null)
    {
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
    }

    include 'authenticate.php';
    ob_end_flush();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
        
        <form action="." method="post">
            Username:<br>
            <input type="text" name="username" echo>
            <br>
            Password:<br>
            <input type="password" name="password">
            <br>
            <input type="checkbox" name="remember" value="remember">Remember me?<br>
            <br>
            <input type="submit" value="Submit">
        </form>
    </body>
</html>
