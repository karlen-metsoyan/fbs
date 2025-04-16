<?php
include_once "check.php";
// Query to get all employees
$query = 'SELECT * FROM cars'; 
$result = pg_query($dbconn, $query) or die('Ошибка запроса: ' . pg_last_error());
echo  '<link rel="stylesheet" href="styles/style_tables.css">';
echo "<center><b>Служебные атомобили</b><br/><br></center>";
// Start table for displaying results
//echo "<center><table border='1'>\n</center>";
echo '<table class="table">';
// Fetch and display column headers
if ($row = pg_fetch_assoc($result)) {
    echo "\t<tr>\n";
    foreach ($row as $column => $value) {
        echo "\t\t<th>$column</th>\n";
    }
    echo "\t</tr>\n";

     //Display the data rows
    do {
        echo "\t<tr>\n";
        foreach ($row as $value) {
            echo "\t\t<td>$value</td>\n";
        }
        echo "\t</tr>\n";
    } while ($row = pg_fetch_assoc($result));
}

echo "</table>\n";

// Clean up the result
pg_free_result($result);

// Close the database connection
pg_close($dbconn);
?>

<center><br><input type="button" onclick="history.back();" value="Назад"/>

<footer>
    <p>© 2025 Karlen Metsoyan</p>
  </footer>
</center>

