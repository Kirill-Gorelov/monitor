<?php
include_once './src/monitor.php';

echo '<pre>';
var_dump(kirill\monitorlinix\Monitorlinux::uptime());
var_dump(kirill\monitorlinix\Monitorlinux::cpu());
var_dump(kirill\monitorlinix\Monitorlinux::meminfo());
var_dump(kirill\monitorlinix\Monitorlinux::disk());
echo '</pre>';
?>