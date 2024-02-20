<!DOCTYPE html>
<?php
require_once('db.php');

$db = new Database();
$con = $db->getConnection();


$usernameToCheck = 'user';


if ($db->isUserAuthorized($usernameToCheck)) {
    echo "Користувач зареєстрований<br>";
} else {
    echo "Користувача не знайдено<br>";
}

$authenticatedUser = false;
$userIsAdmin = false;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $authenticatedUser =$db->authenticateUser($username, $password);

        if (!$authenticatedUser) {
            echo "Невірні данні входу<br>";
        } else {
            $userIsAdmin =$db->isAdmin($username);


            if ($userIsAdmin) {
                echo "Ви зареєстровані і маєте право видаляти повідомлення<br>";
            } else {
                echo "Ви зареєстровані, але не маєте права видаляти повідомлення<br>";
            }
        }
    }


    if ($authenticatedUser && !empty($_POST['name']) && !empty($_POST['message'])) {
        $db->addNewMessage(htmlspecialchars($_POST['name']), htmlspecialchars($_POST['message']));
    } elseif ($authenticatedUser) {
        echo "Заповніть всі поля <br>";
    } else {
        echo "Ви не авторизовані <br>";
    }
}


if (!empty($_GET['delete_message']) && $userIsAdmin) {
    $db->deleteMessage($_GET['delete_message']);
}

$messages =$db->getAllMessages();


$db->closeConnection();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
          crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <title>Form</title>
</head>
<body>
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            Chat
        </div>
        <ul class="list-group list-group-flush">
            <?php foreach ($messages as $message) : ?>
                <li class="list-group-item">
                    <strong><?= $message['name'] ?></strong> at
                    <?= $message['data'] ?> :
                    <i><?= $message['message'] ?></i>
                    <?php if ($userIsAdmin) : ?>
                        <a href="?delete_message=<?= $message['id'] ?>">X</a>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <br><br>
    <form method="post">
        <div class="mb-3">
            <label for="exampleInputName" class="form-label">Name</label>
            <input
                type="text"
                class="form-control"
                name="name"
                <?php if ($authenticatedUser) echo 'value="' . htmlspecialchars($_POST['username']) . '"'; ?>
            >
        </div>
        <div class="mb-3">
            <label for="exampleInputMessage" class="form-label">Message</label>
            <input
                type="text"
                class="form-control"
                name="message"
            >
        </div>
        <?php if ($authenticatedUser) : ?>
            <input type="hidden" name="username" value="<?= htmlspecialchars($_POST['username']) ?>">
            <input type="hidden" name="password" value="<?= htmlspecialchars($_POST['password']) ?>">
        <?php else : ?>
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Username</label>
                <input
                    type="text"
                    class="form-control"
                    name="username"
                >
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword" class="form-label">Password</label>
                <input
                    type="password"
                    class="form-control"
                    name="password"
                >
            </div>
        <?php endif; ?>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
