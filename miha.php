<?php
$miha = pg_connect("host=localhost dbname=miha user=miha_belogolov password=12345");
$query_shuhary = pg_query($miha,"select * from spb where address = 'shuhari'");
$data_shuhary = pg_fetch_assoc($query_shuhary);
echo $data_shuhary['address'];
?>
