<?php
$errorCounter = 0;
if (count($_POST)>0) {
    if (strlen($_POST['reg-name'])===0) {
        echo "Имя не может быть пустым<br>";
        $errorCounter++;
    }
    if (strlen($_POST['reg-email'])===0) {
        echo "email не может быть пустым<br>";
        $errorCounter++;
    } elseif (filter_var($_POST['reg-email'], FILTER_VALIDATE_EMAIL) === false) {
        echo "Вы ввели неправильный email<br>";
        $errorCounter++;
    }

    if (strlen($_POST['reg-pass'])===0) {
        echo "Пароль не может быть пустым<br>";
        $errorCounter++;
    }

    if (strlen($_POST['confirm_reg-pass'])===0) {
        echo "Подтверждение пароля не может быть пустым<br>";
        $errorCounter++;
    }
    if ($_POST['reg-pass'] !== $_POST['confirm_reg-pass']) {
        echo "Пароль и подтверждение пароля не совпадают<br>";
        $errorCounter++;
    }

    if ($errorCounter === 0) {
        echo "Форма в порядке. Регистрируем пользователя.";
        require 'register.php';
    }
}