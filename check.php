<?php
// Скрипт проверки

// Соединямся с БД
$dbconn = pg_connect("host=localhost dbname=fbs user=fbs password=fbs1");
if (!$dbconn) {
    echo "<center>не удалось соединиться с базой данных.\n</center>";
    exit;
    }

if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))
{
    $query = pg_query($dbconn, "SELECT * FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");
    $userdata = pg_fetch_assoc($query);

    if(($userdata['user_hash'] !== $_COOKIE['hash']) or ($userdata['user_id'] !== $_COOKIE['id']))

    {
        setcookie("id", "", time() - 3600*24*30*12, "/");
        setcookie("hash", "", time() - 3600*24*30*12, "/", null, null, true); // httponly !!!
        header("Location: login.php"); exit();
    }
//    else
  //  {
   //     echo "<center>Добро пожаловать, ".$userdata['user_login'].", на сайт fssp!</сenter><right>\n\n\n\n<a href='logout.php'>выход</a></right>";
   // }
}
else
{
    header("Location: login.php"); exit();

}
?>
