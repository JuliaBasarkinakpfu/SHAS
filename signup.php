
<?php session_start(); ?>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <title>Регистрация</title>
  <link href="signup.css" rel="stylesheet" type="text/css">
</head>
<body class="page">
  
  <header class="page-header">
    <div class="container">
      
    </div>
  </header>

  <main class="index-main">
    <div class="container">
      <h1 class="inner-heading">
        <?php if ($_SESSION ['fullname'] ?? false): ?>
        <h1>Пользователь <?= $_SESSION ['fullname'] .'зарегистрирован'?> </h1>
        <?php else: ?>
       <h1 class="inner-heading">Регистрация</h1>
       <?php require 'validate.php'; ?>
      <form class="reg-form" action="signup.php" method="post">
        <input value="<?= $_POST ['fullname'] ?? '' ?>"
           type="text"  
           class ="fullname"
           name="reg-name" 
           placeholder="Имя"
           required />
        <input value="<?= $_POST ['email'] ?? '' ?>"
         type="email"
         class="email"   
         name="reg-email" 
         placeholder="Email"
         required />
        <input value="<?= $_POST ['password'] ?? '' ?>"
         type="password"
         class="password"   
         name="reg-pass" 
         placeholder="Пароль"
         id = "password";
         required />
        <input value="<?= $_POST ['confirm_password'] ?? '' ?>"
         type="password"
         class="confirm_password"
         name="confirm_reg-pass" 
         placeholder="Подтверждение пароля"
         id = "confirm_password"
          required />
        <div class="security">
        <input class="show-password visually-hidden" 
        type="checkbox" 
        id="show-pass"
        onclick = "toggleShowPass()">
        <label class="checkbox-label" for="show-pass">Показать пароль</label>
        </div>
        
        <button class="button" type="submit">Зарегистрироваться</button>
      </div>
    </form>
    <?php endif?>
    </div>
    <?php if (!isset($_SESSION['fullname'])) { ?>    
<div class="in"><a href="login.php">Войти</a></div>
<?php } else { ?>    
<div class="out"><a href = "exit.php">Выйти</a></div>
<?php } ?>

  </main>

  <footer class="page-footer">
    <div class="container">
      
      <a class="footer-logo">
        
      </a>
    </div>
   
  </footer>
  <script>
        function toggleShowPass() {
          var passwordField = document.getElementById("password");
          var confirmPasswordField = document.getElementById("confirm_password");
          if (passwordField.type === "password"){
          passwordField.type = "text";
          confirmPasswordField.type = "text";
        }
          else {
            passwordField.type = "password";
          confirmPasswordField.type = "password"; 
          }
        };
        </script>
        <?php
   
   $servername = "localhost"; 
   $username = "root"; 
   $password = "";
  
   $database = "testdatabase";
  
    // Create a connection 
    $conn = mysqli_connect($servername, 
        $username, $password, $database);
  
   // Код, приведенный ниже, - это
   // проверка, что наша база данных
   // подключена правильно. Если наша
   // БД подключена правильно мы
   // можем удалить эту часть из кода
   // или можем просто оставить этот
   // комментарий на будущее.
  
   if($conn) {
       echo "success"; 
   } 
   else {
       die("Error". mysqli_connect_error()); 
   } 
?>
</body>

