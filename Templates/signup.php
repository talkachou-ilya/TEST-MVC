<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign-up</title>
</head>
<body>
    <?php
        $user = $this->data['user'];
    ?>
    <a href="index.php ">На главную</a><br>
    <form action="/?ctrl=SignUp" method="post">
        <p>
            <label for="login"><b>Логин</b></label><br>
            <input type="text" name="login" id="login">
        </p>
        <p>
            <label for="password"><b>Пароль</b></label><br>
            <input type="text" name="password" id="password">
        </p>
        <p>
            <button type="submit" name="submit">Зарегстрирваться</button>
        </p>
    </form>
    <?php
        $data = $_POST;
        if (isset($data['submit']))
        {
            $user->login = $data['login'];
            $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
            $user->insert();
            $_SESSION['logged_user'] = $user;
            header('Location: /');
        }
    ?>
</body>
</html>