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
  $result = pg_query($dbconn, "insert into gun values ('".$_POST['number_gun']."','".$_POST['name_gun']."','".$date."')");

  if (!$result)
  {
    echo "<center>Произошла ошибка добавления записи.</center>\n";
    }
    else
    {
    echo "<center>Запись успешно добавлена.</center>\n";
  }
}
?>
<link rel="stylesheet" href="styles/form_style.css">

<center>
<form method="POST" novalidate>
<br><br><label for="number_gun" class="text-field_label"> Номер оружия </label>  <input class="text-field_label" id="number_gun" name="number_gun" type="number" required><br>
<label class="text-field_label"> Название оружия </label>  <input class="text-field_label" name="name_gun" type="text"><br>
<label class="text-field_label"> Дата выдачи</label>  <input class="text-field_label"  name="date_issue_gun" type="date"><br>
<br><input class='button' name="submit" type="submit" value="Добавить запись"></center>
</form>
</center>

<center>
<a href='gun.php' class='button'>Назад</a>

<footer>
    <p>© 2025 Karlen Metsoyan</p>
  </footer>
</center>

<style>
a.button {
    padding: 1px 3px;
    border: 0.5px outset buttonborder;
    border-radius: 1px;
    color: buttontext;
    background-color: buttonface;
    text-decoration: none;
}
</style>
