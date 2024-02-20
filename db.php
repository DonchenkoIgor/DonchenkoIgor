<?php

class Database
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbName = 'myDB';
    private $pdo;

    public function __construct()
    {
        $dsn = "mysql:host={$this->host}; dbname={$this->dbName}";
        $this->pdo = new PDO($dsn, $this->username, $this->password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getConnection()
    {
        return $this->pdo;
    }

    public function closeConnection()
    {
        $this->pdo = null;
    }

    public function getAllMessages() : array
    {
        $data = [];
        $sql = "SELECT * FROM messages";
        $stmt = $this->pdo->query($sql);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $data[] = $row;
        }
        return $data;
    }
    public function addNewMessage($name, $message)
    {
        $sql = "INSERT INTO messages (name, message) VALUES (?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$name, $message]);
    }
    public function deleteMessage($id)
    {
        $sql = "DELETE FROM messages WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }
    public function authenticateUser ($username, $password)
    {
        $sql = "SELECT * FROM users WHERE username=? AND password=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$username, $password]);
        return $stmt->rowCount() > 0;
    }
    public function isUserAuthorized ($username)
    {
        $sql = "SELECT * FROM users WHERE username=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$username]);
        return $stmt->rowCount() > 0;
    }
    public function isAdmin($username)
    {
        return ($username === 'admin');
    }
}
?>