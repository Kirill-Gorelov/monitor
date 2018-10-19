<?php
include_once './src/linuxparam.php';

echo '<pre>';
var_dump(Linuxparam\Monitorlinux::uptime());
var_dump(Linuxparam\Monitorlinux::cpu());
var_dump(Linuxparam\Monitorlinux::meminfo());
var_dump(Linuxparam\Monitorlinux::disk());
echo '</pre>';
?>