<?php
include_once "check.php";

if ($userdata['role'] != 'admin')
{
echo "<center>Доступ запрещен</center>";
exit();
}


$date = $_POST['date_issue_gun'];
$date = date("Y-m-d", strtotime($date));

if(isset($_POST['submit']))
{
  pg_query($dbconn, "insert into gun values ('".$_POST['number_gun']."','".$_POST['name_gun']."','".$date."')");
}
?>

<center>
<form method="POST">
Номер оружия <input name="number_gun" type="number" required><br>
Название оружия <input name="name_gun" type="text" ><br>
Дата выдачи  <input name="date_issue_gun" type="date"><br> 
<br><input name="submit" type="submit" value="Добавить запись"></center>
</form>
</center>

<center>
<br><input type="button" onclick="history.back();" value="Назад"/>

<footer>
    <p>© 2025 Karlen Metsoyan</p>
  </footer>
</center>

<style>
a.button {
    padding: 1px 6px;
    border: 1px outset buttonborder;
    border-radius: 3px;
    color: buttontext;
    background-color: buttonface;
    text-decoration: none;
}
</style>
