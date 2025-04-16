<?php
// Страница авторизации

// Функция для генерации случайной строки
function generateCode($length=6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];
    }
    return $code;
}

// Соединямся с БД
//$link=mysqli_connect("localhost", "mysql_user", "mysql_password", "testtable");
$dbconn = pg_connect("host=localhost dbname=fbs user=fbs password=fbs1");
if (!$dbconn) {
    echo "не удалось соединиться с базой данных.\n";
    exit;
    }
//Проверяем нажато ли кнопка "войти"
if(isset($_POST['submit']))
{
    // Вытаскиваем из БД запись, у которой логин равняеться введенному
    $query = pg_query($dbconn,"SELECT user_id, user_password FROM users WHERE user_login='".$_POST['login']."' LIMIT 1");
    $data = pg_fetch_assoc($query);

    // Сравниваем пароли
    if($data['user_password'] === md5(md5($_POST['password'])))
    {
        // Генерируем случайное число и шифруем его
        $hash = md5(generateCode(10));

        // Записываем в БД новый хеш авторизации и IP
        pg_query($dbconn, "UPDATE users SET user_hash='".$hash."' WHERE user_id='".$data['user_id']."'");

        // Ставим куки
        setcookie("id", $data['user_id'], time()+60*60*24*30, "/");
        setcookie("hash", $hash, time()+60*60*24*30, "/", null, null, true); // httponly !!!

        // Переадресовываем браузер на страницу проверки нашего скрипта
        header("Location: index.php"); exit();
    }
    else
    {
        echo "<script>alert('Неправильный логин/пароль')</script>";
    }
}
?>

<!--<center><form method="POST">
Логин <input name="login" type="text" required><br>
Пароль <input name="password" type="password" required><br>
<input name="submit" type="submit" value="Войти">
</form></center>-->


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>FSSP</title>
      <link rel="stylesheet" href="styles/style_login.css">
</head>
<body>
  <h1>Федеральная служба судебных приставов</h1>
<div id="wrapper">
	<form id="signin" method="POST" action="" autocomplete="off">
		<input type="text" name="login" placeholder="username" />
		<input type="password" name="password" placeholder="password" />
		<button type="submit" name="submit">&#xf0da;</button>
		<p>forgot your password? <a href="">click here</a></p>
	</form>
</div>


</body>
</html>
