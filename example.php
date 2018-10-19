<?php
include_once './src/monitor.php';

echo '<pre>';
var_dump(Kirill\Monitorlinux\Monitorlinux::uptime());
var_dump(Kirill\Monitorlinux\Monitorlinux::cpu());
var_dump(Kirill\Monitorlinux\Monitorlinux::meminfo());
var_dump(Kirill\Monitorlinux\Monitorlinux::disk());
echo '</pre>';
?>