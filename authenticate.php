<?php
    $servername = "localhost";
    $serverUsername = "[Redacted]";
    $serverPassword = "[Redacted]";
    $dbname = "[Redacted]";

    try
    {
        // Create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $serverUsername, $serverPassword);
    }
    catch(PDOException $e)
    {
        die("Connection failed: " . $conn->error);
    }
    
    if($username == null || $password == null)
    {
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
    }

    $sql = "SELECT * FROM `users` WHERE username = '$username' AND password = MD5('$password')";
    $result = $conn->query($sql);

    if ($result->rowCount() > 0) {
        echo "Valid login";
        $loggedIn = true;

        $remember = filter_input(INPUT_POST, 'remember');
        if($remember == 'remember')
        {
            setcookie('username', $username, strtotime('+1 week'), '/');
            setcookie('password', $password, strtotime('+1 week'), '/');
        }
        echo '<form action="logOut.php" method="post"><input type="submit" value="Log Out"></form>';
        $conn = null;
    } else {
        echo "Invalid Username or password";
        $loggedIn = false;
        $conn = null;
    }

?>