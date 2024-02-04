<?php
$datetime = new DateTime();

$currentDateTime = new DateTime('2004-05-19');

$birthyDayNow = $datetime->diff($currentDateTime);
echo $birthyDayNow->format('Số ngày đã sống  %y năm,  %m tháng,  %d ngày <br>');

echo $birthyDayNow->days.' ngày <br>';

$totalMonths = $birthyDayNow->y * 12 + $birthyDayNow->m;

echo $totalMonths.' tháng <br>';

echo $birthyDayNow->y.' năm';


?>