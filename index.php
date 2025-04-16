<?php
include_once "check.php";
?>
 <link rel="stylesheet" href="styles/style_index.css">
 <link rel="stylesheet" href="styles/style_welcome.css">
 <link rel="stylesheet" href="styles/style_employees.css">
<canvas id="myCanvas"></canvas>
<!--<script src="js/welcome.js"></script>-->
<script charset="utf-8" type="text/javascript" SRC="js/welcome.js""></script>

 <!--<body bgcolor="#c0c0c0">-->
<?php
echo "<style>h2{line-height: 0.5;}</style><br><br><center><h2>Добро пожаловать, ".$userdata['user_name'].", на сайт fssp!</h2></сenter><right>\n\n\n\n";
?>
<form action="logout.php" target="_blank">
   <button>Выход</button>
  </form>
<div class="category-wrap">
  <h3>Меню сайта</h3>
  <ul>
    <li><a href="employees.php">Сотрудники</a></li>
    <li><a href="gun.php">Оружие</a></li>
    <li><a href="cars.php">Автомобили</a></li>
    <li><a href="office.php">Офисы</a></li>
  </ul>
</div>

<center>
<footer>
    <p>© 2025 Karlen Metsoyan</p>
  </footer>
</center>
