<?php
include_once "check.php";

if ($userdata['role'] != 'admin') {
    echo "<center>Доступ запрещен</center>";
    exit();
}

if (isset($_POST['submit'])) {
    $number_gun = $_POST['number_gun'];
    $date_raw = $_POST['date_issue_gun'];
    $date = date("Y-m-d", strtotime($date_raw));

    // Проверка, чтобы данные были заполнены
    if (empty($number_gun) || empty($date)) {
        echo "<center>Пожалуйста, заполните все поля.</center>";
    } else {
        // Обновляем только дату выдачи
        $query = "UPDATE gun 
                  SET date_issue = '$date' 
                  WHERE number_gun = '$number_gun'";

        $result = pg_query($dbconn, $query);

        if (!$result) {
            echo "<center>Произошла ошибка при обновлении даты.</center>\n";
        } else {
            echo "<center>Дата успешно обновлена.</center>\n";
        }
    }
}
?>

<link rel="stylesheet" href="styles/form_style.css">

<center>
<form method="POST" novalidate>
<br><br><label for="number_gun" class="text-field_label"> Номер оружия </label>  <input class="text-field_label" id="number_gun" name="number_gun" type="num>
<label class="text-field_label"> Дата выдачи</label>  <input class="text-field_label"  name="date_issue_gun" type="date"><br>
<br><input class='button' name="submit" type="submit" value="Изменить запись"></center>
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
