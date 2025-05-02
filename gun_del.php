<?php
include_once "check.php";
if ($userdata['role'] != 'admin')
{
echo "<center>Доступ запрещен</center>";
exit();
}

if (isset($_POST['submit']))
{
     $query1 = pg_query($dbconn,"SELECT number_gun FROM gun WHERE number_gun='".$_POST['number_gun']."' LIMIT 1");
     $data1 = pg_fetch_assoc($query1);
     if (!$data1['number_gun'])
        {
          echo "<center>Указанного номера оружия в базе не существует</center>";
        }
        else
        {
          $number_gun = $_POST['number_gun'];
          $result = pg_query($dbconn, "delete from gun where number_gun = '".$_POST['number_gun']."'");

          if (!$result)
          {
            echo "<center>Ошибка при удалении записи.</center>";
          }
          else
          {
            echo  "<center>Запись успешно удалена.</center>";
          }
        }
}
?>

<link rel="stylesheet" href="styles/form_style.css">

<center>
<form method="POST" onsubmit="return confirmDelete()" novalidate>
<br><br><label for="number_gun" class="text-field_label"> Номер оружия </label> 
<input class="text-field_label" id="number_gun" name="number_gun" type="number" required><br>
<br><input class='button' name="submit" type="submit" value="Удалить оружие"></center>
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

<script>
function confirmDelete() {
    const number_gun = document.getElementById("number_gun").value.trim();
    return confirm("Вы точно хотите удалить запись с номером оружия: " + number_gun + "?");
}
</script>
