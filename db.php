<?php

function getConnection()
{
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbName = 'myDB';

    $con = mysqli_connect($host, $username, $password, $dbName);

    if ($con->connect_error){
        die("No" . $con->connect_error);
    }
    return $con;

}

function showAndDie($something)
{
    echo '<pre>';
    var_dump($something);
    echo '/<pre>';
    die();
}

function getAllMessages($con) : array
{
    $data = [];
    $sql = "SELECT * FROM messages";
    $result = $con->query($sql);

    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $data[] = $row;
    }

    return $data;
}

function addNewMessage ($con, $name, $message)
{

    $sql = "INSERT INTO messages (name, message) VALUES (\"$name\", \"$message\")";

    if (!mysqli_query($con, $sql)){
        echo "Wrong";
    }
}

function deleteMessage($con, $id)
{
    $sql = "DELETE FROM messages WHERE id=" . $id;

    if (!mysqli_query($con, $sql)){
        echo "Wrong";
    }
}

function authenticateUser($con, $username, $password)
{
    $username = mysqli_real_escape_string($con, $username);
    $password = mysqli_real_escape_string($con, $password);
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($con, $sql);



    return mysqli_num_rows($result) > 0;
}

function isUserAuthorized($con, $username)
{
    $username = mysqli_real_escape_string($con, $username);

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($con, $sql);

    return mysqli_num_rows($result) > 0;
}

function isAdmin($username) {

    return ($username === 'admin');
}