<?php session_start();
//error_reporting(E_ALL);
//ini_set('display_startup_errors', 1);
//ini_set('display_errors', '1');?>
<?php include 'configProject.php'; ?>
<?php include 'views/authHead' . $phpExt; ?>

<?php


define('ROOT', dirname(__DIR__));
include("../inc/config.php");

  //проверка подключения к БД

if (!$connect) {
    printf("Connect failed: %s\n", "Помилка підключення бази даних");
    exit();
}



$data = $_POST;
  if (isset($data['restore'])) {

      // Создаем новый пароль
      $newPassword = substr(md5(uniqid(rand(),1)), 0, 12);
      $passwordInDB = md5($newPassword);

    //здесь регистрируем, если кнопка "Регистрация" была нажата

    $errors = array(); //массив в который записываем все ошибки

    if ($data['user_email'] == '') {
      $errors[] = 'Введіть Email';
    }

    $resultreg = $connect->query("SELECT * FROM users WHERE user_email = '?s'", $data['user_email']);
    $myrow = $resultreg -> fetch_assoc();
    if ($data['user_email'] != $myrow['user_email']){
      $errors[] = 'Користувача з таким Email не існує.';
    }?>


    <?php if (empty($errors)):?>
    <?php
      $connect->query("UPDATE `users` SET `user_password` = '?s' WHERE `user_email` = '?s'", $passwordInDB, $data['user_email']);
      echo '<div id="notice">Новий пароль надіслано на Ваш Email. Якщо пароль не прийшов, перевірте папку Спам.</div>';

      // Отправляем сообщение с паролем на Email

      $to = $myrow['user_email'];

      $subject = 'Відновлення пароля на сайті ' . $domain;

      $message = '<p>Вітаємо, '.$myrow['first_name'].'!</p>
                  <p>Ваш Email: '.$myrow['user_email'].'</p>
                  <p>Ваш новий пароль: '.$newPassword.'</p>
                  <p><i>P.S. Лист надіслано системою, відповідати на нього не потрібно.</i></p>
                 ';

      $headers  = "Content-type: text/html; charset=utf-8";

      mail($to, $subject, $message, $headers);?>

    <script>
        setTimeout(document.location.href='/admin/', 10000 );
    </script>;

    <?php else: ?>
      <?php echo '<div id="notice">'.array_shift($errors).'</div>';?>
    <?php endif; ?>
<?php } ?>

<div class="container w-25 mt-5">

  <div class="shadow bg-white rounded">

        <div class="text-center rounded-top h4 bg-light p-3">Новий пароль</div>

        <form action="" method="POST" class="p-3">
            Ваш Email
            <input type="text" name="user_email" class="form-control mb-3" autocomplete="on">
            <input type="submit" name="restore" class="btn btn-primary btn-block mt-3" value="Відновити">
        </form>
        <p class="p-3 text-center text-muted">На Ваш email буде надіслано лист із новим паролем.</p>
  </div>

</div>


</body>
</html>